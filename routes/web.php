<?php

use Illuminate\Support\Facades\Route;
use App\Models\HeroSection;
use App\Models\AboutSection;
use App\Models\GalleryImage;
use App\Models\Article;
use App\Models\ContactMessage;
use App\Models\NavbarSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

Route::get('/', function () {
    return view('welcome', [
        'hero' => HeroSection::latest()->first(),
        'about' => AboutSection::latest()->first(),
        'galleries' => GalleryImage::latest()->get(),
        'initialArticles' => Article::latest()->take(3)->get(),
        'navLinks' => NavbarSetting::all()
    ]);
})->name('home');

// API Endpoint untuk Load More Articles
Route::get('/api/articles', function(Request $request) {
    $skip = $request->query('skip', 0);
    $articles = Article::latest()->skip($skip)->take(3)->get()->map(function($article) {
        return [
            'title' => $article->title,
            'slug' => $article->slug,
            'thumbnail' => $article->thumbnail ?? 'https://placehold.co/600x400/450C1C/FFF?text=No+Image',
            'excerpt' => Str::limit(strip_tags($article->description), 100),
            'date' => $article->created_at->format('d M Y')
        ];
    });
    return response()->json($articles);
});

Route::get('/article/{slug}', function ($slug) {
    $article = Article::where('slug', $slug)->firstOrFail();
    return view('article.show', compact('article'));
})->name('article.show');

/* * SECURITY LAYER FOR CONTACT FORM
 * 1. Throttle: Max 5 request / menit mencegah spammer / bot
 * 2. Input validation & String length limits
 * 3. Sanitization: Hapus script tag berbahaya (Anti-XSS)
 */
Route::post('/contact', function(Request $request) {
    // 1. Validasi Ekstra Ketat (Batasi jumlah karakter)
    $validated = $request->validate([
        'name' => 'required|string|max:100', // Batasi nama max 100 karakter
        'email' => 'required|email:rfc,dns|max:100', // Pastikan format email valid secara DNS/RFC
        'instagram' => 'nullable|string|max:50', // Username IG max 50 karakter
        'message' => 'required|string|max:2000', // Mencegah payload text yang terlalu panjang (DB bomb)
    ]);

    // 2. Sanitasi Input (Cegah XSS Injection di Filament Panel)
    $cleanData = [
        'name' => strip_tags($validated['name']), // Menghapus tag html seperti <script>
        'email' => filter_var($validated['email'], FILTER_SANITIZE_EMAIL),
        'instagram' => isset($validated['instagram']) ? strip_tags($validated['instagram']) : null,
        'message' => htmlspecialchars($validated['message'], ENT_QUOTES, 'UTF-8'), // Mengubah tag bahaya menjadi text biasa
    ];

    // 3. Simpan ke database dengan aman (terproteksi $fillable)
    ContactMessage::create($cleanData);

    return back()->with('success', 'Arigatou Gozaimasu! Pesan Kamu Akan Segera Yuumei Check ya!~ (≧◡≦)');
    
})->name('contact.submit')->middleware('throttle:3,1'); // <-- Batasi 5 submit per menit per IP