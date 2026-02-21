<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kazumii Yukaa - Chibi Magic & Dark Arts</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Mali:ital,wght@0,400;0,600;0,700;1,400&family=Nunito:wght@400;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --bg-dark: #0F0A0D;
            --accent-pink: #FF8AAB;
            --accent-red: #D2042D;
            --dark-red: #450C1C;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background-color: var(--bg-dark);
            color: #ffffff;
            overflow-x: hidden;
            /* Printilan manga screentone dots pattern */
            background-image: radial-gradient(rgba(255, 138, 171, 0.05) 1.5px, transparent 1.5px);
            background-size: 25px 25px;
        }

        .font-cute {
            font-family: 'Mali', cursive;
        }

        /* Custom Scrollbar imut */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-dark);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--dark-red);
            border-radius: 10px;
            border: 2px solid var(--bg-dark);
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--accent-pink);
        }

        .cute-shadow {
            box-shadow: 0 8px 30px -5px rgba(210, 4, 45, 0.4);
        }

        .soft-glow {
            box-shadow: 0 0 40px rgba(255, 138, 171, 0.1);
        }

        .cute-border {
            border: 3px dashed var(--dark-red);
            border-radius: 2rem;
            transition: all 0.4s ease;
        }

        .cute-border:hover {
            border-color: var(--accent-pink);
            transform: translateY(-5px);
        }

        .blob-shape {
            border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;
            animation: morph 8s ease-in-out infinite alternate;
        }

        @keyframes morph {
            0% {
                border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;
            }

            100% {
                border-radius: 60% 40% 30% 70% / 60% 50% 40% 50%;
            }
        }

        .marquee-container {
            display: flex;
            overflow: hidden;
            user-select: none;
            gap: 2rem;
            padding: 2rem 0;
            mask-image: linear-gradient(to right, transparent, black 15%, black 85%, transparent);
        }

        .marquee-content {
            flex-shrink: 0;
            display: flex;
            gap: 2rem;
            min-width: 100%;
            animation: scroll 20s linear infinite;
        }

        .marquee-container:hover .marquee-content {
            animation-play-state: paused;
        }

        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .photo-card {
            width: 240px;
            aspect-ratio: 4/5;
            border-radius: 24px;
            object-fit: cover;
            border: 4px solid var(--dark-red);
            padding: 4px;
            background: #1A1115;
            transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1), border-color 0.3s ease, box-shadow 0.3s ease;
            cursor: zoom-in;
        }

        .photo-card:hover {
            transform: scale(1.05) translateY(-10px) rotate(2deg);
            border-color: var(--accent-pink);
            box-shadow: 0 15px 35px rgba(255, 138, 171, 0.3);
            z-index: 10;
        }

        .lightbox-img-enter {
            opacity: 0;
            transform: scale(0.95);
        }

        .lightbox-img-active {
            opacity: 1;
            transform: scale(1);
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
    </style>
</head>

<body class="antialiased overflow-x-hidden selection:bg-[#FF8AAB] selection:text-[#0F0A0D]">

    <nav class="fixed w-full z-40 top-0 transition-all duration-300 backdrop-blur-xl bg-[#0F0A0D]/80 border-b-2 border-dashed border-[#450C1C]"
        data-aos="fade-down" data-aos-duration="800">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-5 flex justify-between items-center relative">
            <a href="#"
                class="font-cute text-2xl font-bold tracking-wider text-white flex items-center gap-2 hover:text-[#ff8aab] transition-colors relative z-50">
                <span class="text-[#D2042D]">❣</span> {{ $about->name ?? 'Kazumii' }}
            </a>

            <div class="hidden md:flex gap-8 font-bold text-sm items-center">
                <a href="#about"
                    class="text-gray-300 hover:text-[#ff8aab] hover:-translate-y-1 transition-all">About</a>
                <a href="#gallery"
                    class="text-gray-300 hover:text-[#ff8aab] hover:-translate-y-1 transition-all">Gallery</a>
                <a href="#articles"
                    class="text-gray-300 hover:text-[#ff8aab] hover:-translate-y-1 transition-all">Diary</a>
                <a href="#contact"
                    class="px-4 py-2 bg-[#450C1C] rounded-full text-[#ff8aab] hover:bg-[#ff8aab] hover:text-[#0F0A0D] transition-all">Say
                    Hi 👋</a>

                @if ($navLinks && $navLinks->count() > 0)
                    <span class="text-[#450C1C]">|</span>
                    @foreach ($navLinks as $link)
                        <a href="{{ $link->url }}" target="_blank"
                            class="text-[#ff8aab] hover:text-[#D2042D] transition-colors flex items-center gap-1 font-cute">
                            {{ $link->title }} ↗
                        </a>
                    @endforeach
                @endif
            </div>

            <button id="hamburger-btn"
                class="md:hidden text-white focus:outline-none relative z-50 hover:text-[#ff8aab] transition-colors">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
        </div>

        <div id="mobile-menu"
            class="fixed inset-y-0 right-0 w-64 bg-[#1A1115]/95 backdrop-blur-3xl border-l-2 border-dashed border-[#450C1C] transform translate-x-full transition-transform duration-300 ease-in-out z-40 md:hidden flex flex-col pt-24 px-8 shadow-2xl">
            <a href="#about"
                class="mobile-link font-cute text-xl text-gray-300 hover:text-[#ff8aab] font-bold py-4 border-b border-[#450C1C]/50 transition-colors">About</a>
            <a href="#gallery"
                class="mobile-link font-cute text-xl text-gray-300 hover:text-[#ff8aab] font-bold py-4 border-b border-[#450C1C]/50 transition-colors">Gallery</a>
            <a href="#articles"
                class="mobile-link font-cute text-xl text-gray-300 hover:text-[#ff8aab] font-bold py-4 border-b border-[#450C1C]/50 transition-colors">Diary</a>
            <a href="#contact"
                class="mobile-link font-cute text-xl text-[#ff8aab] hover:text-white font-bold py-4 border-b border-[#450C1C]/50 transition-colors">Say
                Hi 👋</a>

            @if ($navLinks && $navLinks->count() > 0)
                <div class="mt-6">
                    <p class="text-xs text-[#D2042D] font-bold tracking-widest uppercase mb-3">✦ Links</p>
                    @foreach ($navLinks as $link)
                        <a href="{{ $link->url }}" target="_blank"
                            class="block font-cute text-lg text-[#ff8aab] hover:text-[#D2042D] font-bold py-2 transition-colors">
                            {{ $link->title }} ↗
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </nav>

    <div id="mobile-overlay"
        class="fixed inset-0 bg-[#0F0A0D]/60 backdrop-blur-sm z-30 hidden opacity-0 transition-opacity duration-300 md:hidden">
    </div>

    <section class="relative min-h-screen flex items-center justify-center pt-20 overflow-hidden">
        @if ($hero && $hero->thumbnail)
            <div class="absolute inset-0 z-0">
                <img src="{{ $hero->thumbnail }}" alt="Hero Background"
                    class="w-full h-full object-cover opacity-15 filter blur-[3px]">
                <div class="absolute inset-0 bg-gradient-to-t from-[#0F0A0D] via-[#0F0A0D]/70 to-transparent"></div>
            </div>
        @endif

        <div class="relative z-10 text-center px-6 max-w-3xl mx-auto" data-aos="zoom-in-up" data-aos-duration="1200">
            <div
                class="inline-flex items-center gap-2 mb-6 px-6 py-2 rounded-full bg-[#1A1115]/80 backdrop-blur-sm border-2 border-dashed border-[#450C1C] text-[#ff8aab] font-bold text-xs tracking-widest uppercase">
                <span class="w-2 h-2 rounded-full bg-[#D2042D] animate-ping"></span>
                Welcome to my dark-cute space 💉🎀
            </div>
            <h1 class="font-cute text-5xl md:text-7xl font-bold mb-6 text-white drop-shadow-2xl tracking-tight">
                {{ $hero->title ?? 'Kazumii Yukaa' }}
            </h1>
            <p class="text-lg md:text-xl text-gray-300 font-medium mb-10 leading-relaxed max-w-2xl mx-auto">
                "{{ $hero->quote ?? 'Dark concept alert! Tapi tetep imut kok (｡♥‿♥｡)' }}"
            </p>
            <div data-aos="fade-up" data-aos-delay="300">
                <a href="#gallery"
                    class="font-cute inline-flex items-center gap-3 px-8 py-4 rounded-full bg-[#D2042D] text-white font-bold text-lg hover:bg-[#ff8aab] hover:text-[#0F0A0D] cute-shadow transition-all duration-300 hover:-translate-y-1">
                    See My Art 🔪 <span class="transition-transform group-hover:translate-x-1">&rarr;</span>
                </a>
            </div>
        </div>

        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-[#D2042D] rounded-full blur-[150px] opacity-10 pointer-events-none z-0">
        </div>
    </section>

    <section id="about" class="py-24 relative bg-transparent">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center gap-16 lg:gap-24">
                <div class="w-full md:w-1/2 flex justify-center" data-aos="fade-right" data-aos-duration="1000">
                    <div class="relative group">
                        <div
                            class="absolute inset-0 bg-[#ff8aab] blob-shape blur-[40px] opacity-20 group-hover:opacity-40 transition-opacity duration-500">
                        </div>
                        <div class="relative blob-shape p-2 bg-gradient-to-br from-[#450C1C] to-[#D2042D]">
                            <img src="{{ $about->thumbnail ?? 'https://placehold.co/400' }}" alt="About Me"
                                class="w-64 h-64 md:w-80 md:h-80 object-cover blob-shape border-4 border-[#0F0A0D] shadow-[0_0_40px_rgba(210,4,45,0.4)] transition-transform duration-500 group-hover:scale-105">
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                    <h2 class="font-cute text-[#ff8aab] font-bold tracking-widest text-lg mb-2">✦ Get to know me</h2>
                    <h3 class="font-cute text-4xl md:text-5xl font-bold mb-5 text-white">
                        {{ $about->name ?? 'Kazumii Yukaa' }}</h3>
                    <div
                        class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-[#1A1115] border border-[#450C1C] text-sm font-bold mb-8 text-[#ff8aab]">
                        🎀 {{ $about->role ?? 'Vtuber & Chibi Artist' }}
                    </div>
                    <div
                        class="text-gray-300 leading-relaxed text-lg space-y-5 prose prose-invert prose-p:text-gray-300">
                        {!! $about->about_me ??
                            '<p>Hello! I make cute arts with a little bit of dark twist. Thanks for dropping by my bloody little corner! (๑˃ᴗ˂)ﻭ</p>' !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="gallery" class="py-24 relative overflow-hidden bg-transparent">
        <div
            class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-[#D2042D] to-transparent opacity-30">
        </div>

        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <h2 class="font-cute text-[#ff8aab] font-bold tracking-widest text-lg mb-2">✦ Masterpieces</h2>
            <h3 class="font-cute text-4xl font-bold text-white">Tiny Art Gallery 🩸</h3>
            <p class="text-gray-400 mt-4 text-sm font-bold">Click image to view closer (๑˃ᴗ˂)ﻭ</p>
        </div>

        @if ($galleries && $galleries->count() > 0)
            <div class="marquee-container" data-aos="fade-in" data-aos-duration="1200" data-aos-delay="200">
                <div class="marquee-content">
                    @foreach ($galleries as $gallery)
                        <img src="{{ $gallery->thumbnail }}" alt="{{ $gallery->title }}" class="photo-card"
                            loading="lazy" onclick="openLightbox(this.src)">
                    @endforeach
                </div>
                <div class="marquee-content" aria-hidden="true">
                    @foreach ($galleries as $gallery)
                        <img src="{{ $gallery->thumbnail }}" alt="{{ $gallery->title }}" class="photo-card"
                            loading="lazy" onclick="openLightbox(this.src)">
                    @endforeach
                </div>
            </div>
        @else
            <p class="text-center text-gray-500 italic font-cute" data-aos="fade-up">No artworks yet. Coming soon!</p>
        @endif
    </section>

    <section id="articles" class="py-24 relative bg-transparent">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="font-cute text-[#ff8aab] font-bold tracking-widest text-lg mb-2">✦ My Thoughts</h2>
                <h3 class="font-cute text-4xl font-bold text-white">Kazumii's Diary</h3>
            </div>

            <div id="article-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($initialArticles as $index => $article)
                    <a href="{{ route('article.show', $article->slug) }}" data-aos="fade-up" data-aos-duration="800"
                        data-aos-delay="{{ $index * 150 }}"
                        class="bg-[#1A1115] overflow-hidden cute-border soft-glow flex flex-col h-full group p-2">
                        <div class="relative overflow-hidden h-56 rounded-[1.5rem]">
                            <img src="{{ $article->thumbnail ?? 'https://placehold.co/600x400/450C1C/FFF?text=Article' }}"
                                alt="{{ $article->title }}"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#1A1115] to-transparent opacity-90">
                            </div>
                        </div>
                        <div class="p-6 flex flex-col flex-grow relative -mt-10 z-10">
                            <span
                                class="font-cute inline-block px-4 py-1.5 rounded-full bg-[#450C1C] border border-[#D2042D] text-xs font-bold text-[#ff8aab] mb-4 w-max shadow-md">
                                ❀ {{ $article->created_at->format('d M Y') }}
                            </span>
                            <h4
                                class="font-cute text-xl font-bold text-white mb-3 line-clamp-2 group-hover:text-[#ff8aab] transition-colors">
                                {{ $article->title }}
                            </h4>
                            <p class="text-gray-400 text-sm mb-6 flex-grow line-clamp-3 leading-relaxed">
                                {{ Str::limit(strip_tags($article->description), 100) }}
                            </p>
                            <div class="text-[#D2042D] font-bold text-sm group-hover:text-[#ff8aab] transition-colors">
                                Read More ⇢
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-16 text-center" id="load-more-container" data-aos="zoom-in">
                <button id="btn-load-more"
                    class="font-cute px-8 py-4 rounded-full bg-transparent border-2 border-dashed border-[#ff8aab] text-[#ff8aab] font-bold hover:bg-[#ff8aab] hover:text-[#0F0A0D] transition-all duration-300 hover:shadow-[0_0_20px_rgba(255,138,171,0.4)]">
                    Load More Diary ✿
                </button>
            </div>
        </div>
    </section>

    <section id="contact" class="py-24 relative overflow-hidden bg-transparent">
        <div
            class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-[#D2042D] rounded-full blur-[150px] opacity-10 pointer-events-none">
        </div>

        <div class="max-w-3xl mx-auto px-6 lg:px-8 relative z-10">
            <div class="bg-[#1A1115] p-8 md:p-14 rounded-[3rem] border-4 border-dashed border-[#450C1C] shadow-[0_20px_50px_rgba(0,0,0,0.5)]"
                data-aos="fade-up" data-aos-duration="1000">
                <div class="text-center mb-10">
                    <h3 class="font-cute text-3xl font-bold text-white mb-3">Leave a Note 💌</h3>
                    <p class="text-gray-400">Want to commission or say hi? Don't be shy, I don't bite... much. 🦇</p>
                </div>

                @if (session('success'))
                    <div class="mb-8 p-4 rounded-2xl bg-[#450C1C]/80 backdrop-blur-sm border border-[#D2042D] text-[#ff8aab] text-center font-bold"
                        data-aos="zoom-in">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="font-cute block text-sm font-bold text-[#ff8aab] mb-2 pl-2">Your Name</label>
                            <input type="text" name="name" required
                                class="w-full bg-[#0F0A0D] border-2 border-[#450C1C] rounded-2xl px-5 py-4 text-white focus:border-[#ff8aab] focus:ring-1 focus:ring-[#ff8aab] outline-none transition-all placeholder-gray-700"
                                placeholder="E.g. Senpai">
                        </div>
                        <div>
                            <label class="font-cute block text-sm font-bold text-[#ff8aab] mb-2 pl-2">Email
                                Address</label>
                            <input type="email" name="email" required
                                class="w-full bg-[#0F0A0D] border-2 border-[#450C1C] rounded-2xl px-5 py-4 text-white focus:border-[#ff8aab] focus:ring-1 focus:ring-[#ff8aab] outline-none transition-all placeholder-gray-700"
                                placeholder="mail@example.com">
                        </div>
                    </div>
                    <div>
                        <label class="font-cute block text-sm font-bold text-[#ff8aab] mb-2 pl-2">Instagram Username
                            <span class="text-gray-600 font-normal">(Optional)</span></label>
                        <div class="relative">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-5 text-[#D2042D] font-bold">@</span>
                            <input type="text" name="instagram"
                                class="w-full bg-[#0F0A0D] border-2 border-[#450C1C] rounded-2xl pl-10 pr-5 py-4 text-white focus:border-[#ff8aab] focus:ring-1 focus:ring-[#ff8aab] outline-none transition-all placeholder-gray-700"
                                placeholder="username">
                        </div>
                    </div>
                    <div>
                        <label class="font-cute block text-sm font-bold text-[#ff8aab] mb-2 pl-2">Message</label>
                        <textarea name="message" rows="5" required
                            class="w-full bg-[#0F0A0D] border-2 border-[#450C1C] rounded-2xl px-5 py-4 text-white focus:border-[#ff8aab] focus:ring-1 focus:ring-[#ff8aab] outline-none resize-none transition-all placeholder-gray-700"
                            placeholder="Write your sweet or dark message here..."></textarea>
                    </div>
                    <button type="submit"
                        class="font-cute w-full py-4 rounded-2xl bg-[#D2042D] text-white font-bold text-lg hover:bg-[#ff8aab] hover:text-[#0F0A0D] transition-all duration-300 cute-shadow transform hover:-translate-y-1">
                        Send Message 🖤
                    </button>
                </form>
            </div>
        </div>
    </section>

    <footer class="py-8 border-t-2 border-dashed border-[#450C1C] text-center bg-[#0F0A0D]">
        <p class="font-cute text-gray-500 font-medium text-sm">© {{ date('Y') }} Kazumi Yuuka</p>
    </footer>

    <div id="lightbox"
        class="fixed inset-0 z-[100] bg-[#0F0A0D]/95 hidden flex items-center justify-center backdrop-blur-md transition-opacity duration-300 opacity-0"
        onclick="closeLightbox()">
        <button class="absolute top-6 right-8 text-[#ff8aab] hover:text-white transition-colors p-2 z-[101]"
            onclick="closeLightbox()">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <img id="lightbox-img" src="" alt="Zoomed Artwork"
            class="max-w-[90vw] max-h-[85vh] object-contain rounded-[2rem] border-4 border-[#D2042D] shadow-[0_0_60px_rgba(210,4,45,0.4)] lightbox-img-enter"
            onclick="event.stopPropagation()">
    </div>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll('a[href^="#"]').forEach(link => {
                link.addEventListener("click", function(e) {
                    const targetId = this.getAttribute("href");
                    if (targetId.length > 1) {
                        e.preventDefault();
                        const target = document.querySelector(targetId);
                        if (target) {
                            target.scrollIntoView({
                                behavior: "smooth"
                            });
                            history.replaceState(null, null, window.location.pathname);
                        }
                    }
                });
            });

            if (window.location.hash) {
                const target = document.querySelector(window.location.hash);
                if (target) {
                    target.scrollIntoView();
                    history.replaceState(null, null, window.location.pathname);
                }
            }
        });

        AOS.init({
            once: true,
            offset: 50,
            duration: 800,
            easing: 'ease-out-cubic'
        });

        const btn = document.getElementById('hamburger-btn');
        const menu = document.getElementById('mobile-menu');
        const overlay = document.getElementById('mobile-overlay');
        const mobileLinks = document.querySelectorAll('.mobile-link');
        let menuOpen = false;

        function toggleMenu() {
            menuOpen = !menuOpen;
            if (menuOpen) {
                menu.classList.remove('translate-x-full');
                overlay.classList.remove('hidden');
                setTimeout(() => overlay.classList.remove('opacity-0'), 10);
                document.body.style.overflow = 'hidden';
            } else {
                menu.classList.add('translate-x-full');
                overlay.classList.add('opacity-0');
                setTimeout(() => overlay.classList.add('hidden'), 300);
                document.body.style.overflow = 'auto';
            }
        }

        btn.addEventListener('click', toggleMenu);
        overlay.addEventListener('click', toggleMenu);
        mobileLinks.forEach(link => link.addEventListener('click', toggleMenu));

        function openLightbox(src) {
            const lb = document.getElementById('lightbox');
            const lbImg = document.getElementById('lightbox-img');
            lbImg.src = src;
            lb.classList.remove('hidden');
            setTimeout(() => {
                lb.classList.remove('opacity-0');
                lbImg.classList.remove('lightbox-img-enter');
                lbImg.classList.add('lightbox-img-active');
            }, 10);
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            const lb = document.getElementById('lightbox');
            const lbImg = document.getElementById('lightbox-img');
            lb.classList.add('opacity-0');
            lbImg.classList.remove('lightbox-img-active');
            lbImg.classList.add('lightbox-img-enter');
            setTimeout(() => {
                lb.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 300);
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === "Escape" && !document.getElementById('lightbox').classList.contains('hidden')) {
                closeLightbox();
            }
        });
        console.log(
            "%c 君のために作ったんだよ - ゆいい ",
            "color:aqua; font-size:20px; font-weight:bold;"
        );
        console.log(
            "%c 何かあったらいつでも言ってね！",
            "color:aqua; font-size:20px; font-weight:bold;"
        );
        console.log(
            "%c yuiichirodev@gmail.com",
            "color:aqua; font-size:20px; font-weight:bold;"
        );
        document.addEventListener('DOMContentLoaded', function() {
            const btnLoadMore = document.getElementById('btn-load-more');
            const articleGrid = document.getElementById('article-grid');
            let skip = 3;

            if (btnLoadMore) {
                btnLoadMore.addEventListener('click', async function() {
                    btnLoadMore.innerHTML = '<span class="animate-pulse">Loading...</span>';
                    btnLoadMore.disabled = true;

                    try {
                        const response = await fetch(`/api/articles?skip=${skip}`);
                        const articles = await response.json();

                        if (articles.length > 0) {
                            articles.forEach((article, index) => {
                                const articleHtml = `
                                    <a href="/article/${article.slug}" data-aos="fade-up" data-aos-duration="800" data-aos-delay="${index * 100}" class="bg-[#1A1115] overflow-hidden cute-border soft-glow flex flex-col h-full group p-2">
                                        <div class="relative overflow-hidden h-56 rounded-[1.5rem]">
                                            <img src="${article.thumbnail}" alt="${article.title}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                            <div class="absolute inset-0 bg-gradient-to-t from-[#1A1115] to-transparent opacity-90"></div>
                                        </div>
                                        <div class="p-6 flex flex-col flex-grow relative -mt-10 z-10">
                                            <span class="font-cute inline-block px-4 py-1.5 rounded-full bg-[#450C1C] border border-[#D2042D] text-xs font-bold text-[#ff8aab] mb-4 w-max shadow-md">
                                                ❀ ${article.date}
                                            </span>
                                            <h4 class="font-cute text-xl font-bold text-white mb-3 line-clamp-2 group-hover:text-[#ff8aab] transition-colors">${article.title}</h4>
                                            <p class="text-gray-400 text-sm mb-6 flex-grow line-clamp-3 leading-relaxed">${article.excerpt}</p>
                                            <div class="text-[#D2042D] font-bold text-sm group-hover:text-[#ff8aab] transition-colors">
                                                Read More ⇢
                                            </div>
                                        </div>
                                    </a>
                                `;
                                articleGrid.insertAdjacentHTML('beforeend', articleHtml);
                            });

                            setTimeout(() => {
                                AOS.refresh();
                            }, 100);

                            skip += articles.length;
                            btnLoadMore.innerHTML = 'Load More Diary ✿';
                            btnLoadMore.disabled = false;

                            if (articles.length < 3) btnLoadMore.style.display = 'none';
                        } else {
                            btnLoadMore.style.display = 'none';
                        }
                    } catch (error) {
                        console.error('Error fetching articles:', error);
                        btnLoadMore.innerHTML = 'Error. Try Again.';
                        btnLoadMore.disabled = false;
                    }
                });
            }
        });
    </script>
</body>

</html>
