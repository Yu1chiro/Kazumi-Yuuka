<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }} - Kazumii Diary</title>

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

        /* * PROSE CUSTOM (Yami Kawaii Edition) */
        .prose-custom {
            font-size: 1.125rem;
            line-height: 1.8;
            color: #E5E7EB;
        }

        .prose-custom p {
            margin-top: 1.25em;
            margin-bottom: 1.25em;
            word-break: break-word;
        }

        .prose-custom h2 {
            font-family: 'Mali', cursive;
            color: #ffffff;
            font-size: 2em;
            font-weight: 700;
            margin-top: 2em;
            margin-bottom: 1em;
            line-height: 1.3;
            border-bottom: 3px dashed var(--dark-red);
            padding-bottom: 0.5em;
        }

        .prose-custom h3 {
            font-family: 'Mali', cursive;
            color: var(--accent-pink);
            font-size: 1.5em;
            font-weight: 700;
            margin-top: 1.6em;
            margin-bottom: 0.6em;
        }

        .prose-custom strong {
            color: #ffffff;
            font-weight: 800;
            background: linear-gradient(120deg, rgba(210, 4, 45, 0.5) 0%, rgba(125, 13, 44, 0) 100%);
            padding: 0 0.4em;
            border-radius: 6px;
        }

        .prose-custom a {
            color: var(--accent-pink);
            text-decoration: underline;
            text-decoration-style: wavy;
            text-decoration-color: var(--accent-red);
            text-decoration-thickness: 2px;
            text-underline-offset: 4px;
            transition: color 0.3s;
            font-weight: 700;
        }

        .prose-custom a:hover {
            color: #ffffff;
        }

        .prose-custom blockquote {
            font-style: italic;
            color: var(--accent-pink);
            border-left: 6px dashed var(--accent-red);
            margin-top: 1.6em;
            margin-bottom: 1.6em;
            background: #1A1115;
            padding: 1.5em;
            border-radius: 0 2rem 2rem 0;
            box-shadow: 4px 4px 0px rgba(69, 12, 28, 0.8);
        }

        .prose-custom ul {
            list-style-type: '🩸 ';
            padding-left: 1.625em;
            margin-top: 1.25em;
            margin-bottom: 1.25em;
            color: var(--accent-pink);
        }

        .prose-custom ul li span {
            color: #E5E7EB;
        }

        .prose-custom img {
            border-radius: 2rem;
            margin-top: 2.5em;
            margin-bottom: 2.5em;
            width: 100%;
            border: 4px dashed var(--dark-red);
            padding: 4px;
            background: #1A1115;
            box-shadow: 0 10px 30px rgba(210, 4, 45, 0.2);
        }
    </style>
</head>

<body class="antialiased selection:bg-[#FF8AAB] selection:text-[#0F0A0D]">

    <nav class="w-full p-6 fixed top-0 z-50 pointer-events-none">
        <div class="max-w-4xl mx-auto flex justify-start">
            <a href="{{ route('home') }}" data-aos="fade-right" data-aos-duration="800"
                class="pointer-events-auto font-cute inline-flex items-center gap-2 px-6 py-3 bg-[#1A1115]/90 backdrop-blur-xl border-2 border-dashed border-[#450C1C] rounded-full text-[#ff8aab] font-bold hover:text-[#0F0A0D] hover:border-[#ff8aab] hover:bg-[#ff8aab] shadow-lg transition-all duration-300 transform hover:-translate-x-1">
                &larr; Back to Home 🦇
            </a>
        </div>
    </nav>

    <header class="relative pt-36 pb-20 px-6 lg:px-8 border-b-2 border-dashed border-[#450C1C] overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-[#1A1115] to-transparent z-0"></div>
        <div
            class="absolute top-0 right-0 w-[300px] h-[300px] bg-[#D2042D] rounded-full blur-[120px] opacity-15 pointer-events-none z-0">
        </div>

        <div class="max-w-4xl mx-auto text-center relative z-10">
            <div data-aos="fade-up" data-aos-duration="800"
                class="font-cute inline-block px-5 py-2 rounded-full bg-[#1A1115] border border-[#D2042D] text-[#ff8aab] text-xs font-bold tracking-widest uppercase mb-6 shadow-sm">
                ✿ {{ $article->created_at->format('d F Y') }} ✿
            </div>

            <h1 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100"
                class="font-cute text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-10 leading-tight drop-shadow-lg">
                {{ $article->title }}
            </h1>

            @if ($article->thumbnail)
                <div data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="200"
                    class="relative w-full aspect-[16/9] md:aspect-[2.5/1] mt-8 rounded-[2.5rem] overflow-hidden border-4 dashed border-[#450C1C] p-2 bg-[#1A1115] shadow-[0_15px_40px_rgba(210,4,45,0.2)] group">
                    <img src="{{ $article->thumbnail }}" alt="{{ $article->title }}"
                        class="w-full h-full object-cover rounded-[2rem] transition-transform duration-1000 group-hover:scale-105">
                </div>
            @endif
        </div>
    </header>

    <main class="py-20 px-6 lg:px-8 bg-transparent relative z-10">
        <article class="max-w-3xl mx-auto prose-custom" data-aos="fade-up" data-aos-duration="1000">
            {!! $article->description !!}
        </article>
    </main>

    <footer class="py-16 border-t-2 border-dashed border-[#450C1C] text-center bg-[#0F0A0D] relative overflow-hidden">
        <div
            class="absolute bottom-[-50%] left-1/2 -translate-x-1/2 w-[500px] h-[500px] bg-[#D2042D] rounded-full blur-[150px] opacity-10 pointer-events-none">
        </div>

        <div class="max-w-4xl mx-auto px-6 flex flex-col items-center relative z-10" data-aos="fade-up"
            data-aos-offset="50">
            <h4 class="font-cute text-2xl md:text-3xl font-bold text-white mb-3">Loved reading this? 💉🎀</h4>
            <p class="text-gray-400 mb-8 font-bold">Peek at my other dark little secrets!</p>
            <a href="{{ route('home') }}#articles"
                class="font-cute px-10 py-4 rounded-full bg-[#D2042D] text-white font-bold hover:bg-[#ff8aab] hover:text-[#0F0A0D] shadow-[0_10px_30px_rgba(210,4,45,0.3)] transition-all duration-300 hover:-translate-y-1">
                Read More Diaries ⇢
            </a>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            offset: 100,
            duration: 800,
            easing: 'ease-out-cubic'
        });
    </script>
</body>

</html>
