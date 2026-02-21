<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\AboutSection;
use App\Models\GalleryImage;
use App\Models\Article;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $hero = HeroSection::latest()->first();
        $about = AboutSection::latest()->first();
        $galleries = GalleryImage::latest()->get();
        $articles = Article::latest()->get();

        return response()->json([
            'status' => 'success',
            'data' => [
                'hero' => $hero,
                'about' => $about,
                'galleries' => $galleries,
                'articles' => $articles,
            ]
        ]);
    }

    public function showArticle($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        
        return response()->json([
            'status' => 'success',
            'data' => $article
        ]);
    }
    

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Your message has been sent successfully.'
        ], 201);
    }
}