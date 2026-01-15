<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $article->title }} | Humour Resource</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Styles -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif

    <style>
        [x-cloak] { display: none !important; }
        /* Typography Theme Overrides */
        .prose h2, .prose h3 { font-family: 'Playfair Display', serif; color: #112240; margin-top: 2em; margin-bottom: 0.5em; }
        .prose p { margin-bottom: 1.5em; line-height: 1.8; color: #4B5563; }
        .prose strong { color: #0A192F; font-weight: 700; }
        .prose ul { list-style-type: disc; padding-left: 1.5em; margin-bottom: 1.5em; }
        .prose li { margin-bottom: 0.5em; }
        .prose blockquote { border-left: 4px solid #C5A059; padding-left: 1em; font-style: italic; color: #4B5563; background: #F9FAFB; padding: 1.5rem; border-radius: 0 0.5rem 0.5rem 0; }
    </style>
</head>
<body class="font-sans antialiased text-gray-800 bg-white" x-data="{ mobileMenuOpen: false }">

    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-navy-900/95 backdrop-blur-sm border-b border-white/10 transition-all duration-300">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-serif font-bold tracking-wide text-white">
                Humour<span class="text-gold-500">Resource</span>
            </a>
            
            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8 text-sm font-medium tracking-widest uppercase items-center">
                <a href="/#expertise" class="text-gray-300 hover:text-gold-500 transition-colors">Expertise</a>
                <a href="/#stories" class="text-gold-500 transition-colors">Narratives</a>
                <a href="/#contact" class="px-6 py-2 border border-gold-500 text-gold-500 hover:bg-gold-500 hover:text-navy-900 transition-all rounded-sm">
                    Get in Touch
                </a>
            </div>

            <!-- Mobile Button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-white focus:outline-none">
                <svg x-show="!mobileMenuOpen" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                <svg x-show="mobileMenuOpen" x-cloak class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <!-- Mobile Menu Overlay -->
        <div x-show="mobileMenuOpen" x-cloak class="fixed inset-0 z-40 bg-navy-900/98 backdrop-blur-md flex items-center justify-center md:hidden">
            <div class="flex flex-col space-y-8 text-center">
                <a href="/" class="text-2xl font-serif text-white hover:text-gold-500">Home</a>
                <a href="/#stories" class="text-2xl font-serif text-white hover:text-gold-500">Narratives</a>
                <a href="/#contact" class="inline-block px-8 py-4 border-2 border-gold-500 text-gold-500 font-bold text-xl rounded-full">Book Session</a>
            </div>
        </div>
    </nav>

    <!-- Reading Hero -->
    <header class="relative bg-navy-900 text-white min-h-[50vh] flex items-center pt-24 pb-12 overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-navy-800 to-navy-900"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5"></div>
        
        <div class="container mx-auto px-6 relative z-10 text-center max-w-4xl">
            <div class="mb-8">
                <a href="/" class="inline-flex items-center text-gray-400 hover:text-white transition-colors text-sm font-medium tracking-wider uppercase mb-6">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Back to Home
                </a>
                
                @php
                    $catName = match($article->category_id) {
                        1 => 'Life Issues',
                        2 => 'Corporate Chronicles',
                        default => 'Career Advice'
                    };
                @endphp
                <div class="flex items-center justify-center gap-4 mb-4">
                    <span class="text-gold-500 font-bold tracking-widest uppercase text-xs border border-gold-500/30 px-3 py-1 rounded-full bg-gold-500/10">
                        {{ $catName }}
                    </span>
                    <span class="text-gray-400 text-xs uppercase tracking-widest">{{ $article->read_time }} min read</span>
                </div>
            </div>

            <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif font-bold mb-8 leading-tight text-transparent bg-clip-text bg-gradient-to-r from-white via-gray-200 to-gray-400">
                {{ $article->title }}
            </h1>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-16">
        <div class="flex flex-col lg:flex-row gap-16">
            
            <!-- Article Body -->
            <article class="w-full lg:w-2/3">
                <div class="rounded-xl overflow-hidden shadow-2xl mb-12 border border-gray-100">
                    <img src="https://placehold.co/800x400/112240/C5A059?text={{ urlencode($article->title) }}" 
                         alt="{{ $article->title }}" 
                         loading="lazy"
                         class="w-full h-auto object-cover transform hover:scale-105 transition-transform duration-700">
                </div>

                <div class="prose prose-lg prose-slate max-w-none font-serif leading-loose text-gray-600 first-letter:text-5xl first-letter:font-bold first-letter:text-navy-900 first-letter:mr-3 first-letter:float-left">
                    {!! nl2br(e($article->content)) !!}
                </div>

                <div class="mt-16 pt-8 border-t border-gray-200 flex items-center">
                    <div class="w-12 h-12 bg-navy-900 rounded-full flex items-center justify-center text-gold-500 font-serif font-bold text-xl mr-4">HR</div>
                    <div>
                        <p class="text-sm font-bold text-navy-900">Humour Resource Team</p>
                        <p class="text-xs text-gray-500">Narrative Strategists</p>
                    </div>
                </div>
            </article>

            <!-- Sidebar -->
            <aside class="w-full lg:w-1/3 space-y-8">
                <div class="sticky top-24">
                    <!-- Subscribe Widget -->
                    <div x-data="{ 
                            email: '', 
                            loading: false, 
                            message: '',
                            status: null,
                            submit() {
                                this.loading = true;
                                fetch('{{ route('newsletter.subscribe') }}', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'Accept': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                                    },
                                    body: JSON.stringify({ email: this.email })
                                })
                                .then(res => res.json().then(data => ({ status: res.status, body: data })))
                                .then(({ status, body }) => {
                                    this.loading = false;
                                    this.status = (status >= 200 && status < 300) ? 'success' : 'error';
                                    this.message = body.message || 'Error subscribing.';
                                    if(this.status === 'success') this.email = '';
                                });
                            }
                        }"
                        class="bg-navy-900 text-white p-8 rounded-xl shadow-xl relative overflow-hidden group">
                        
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gold-500/10 rounded-full -mr-10 -mt-10 blur-2xl group-hover:bg-gold-500/20 transition-all duration-700"></div>
                        
                        <h3 class="text-2xl font-serif font-bold mb-2 text-white relative z-10">Get the Red Flags Guide</h3>
                        <p class="text-gray-400 text-sm mb-6 relative z-10">Don't let toxic culture win. Join 2,000+ leaders receiving our weekly narratives.</p>
                        
                        <form @submit.prevent="submit" class="relative z-10 space-y-3">
                            <input x-model="email" type="email" placeholder="Your work email" required class="w-full bg-navy-800 border border-navy-700 text-white rounded px-4 py-3 focus:outline-none focus:border-gold-500 placeholder-gray-500 transition-colors">
                            <button type="submit" :disabled="loading" class="w-full bg-gold-500 text-navy-900 font-bold py-3 rounded hover:bg-white transition-all duration-300 disabled:opacity-50">
                                <span x-show="!loading">Send Me The Guide</span>
                                <span x-show="loading" x-cloak>Processing...</span>
                            </button>
                        </form>
                        <div x-show="message" x-cloak class="mt-4 text-xs font-bold" :class="status === 'success' ? 'text-green-400' : 'text-red-400'" x-text="message"></div>
                    </div>
                </div>
            </aside>
        </div>
    </main>

    <!-- Recommendations -->
    <section class="bg-gray-50 py-20 border-t border-gray-200">
        <div class="container mx-auto px-6">
            <h3 class="text-3xl font-serif font-bold text-navy-900 mb-10 text-center">Keep Reading</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                @foreach($recommendations as $rec)
                <a href="{{ route('articles.show', $rec->slug) }}" class="group flex bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-lg transition-all">
                    <div class="w-1/3 overflow-hidden">
                        <img src="https://placehold.co/400x400/112240/C5A059?text={{ urlencode(Str::limit($rec->title, 5)) }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="w-2/3 p-6 flex flex-col justify-center">
                        <span class="text-xs font-bold text-gold-500 uppercase tracking-widest mb-2">Read Next</span>
                        <h4 class="font-serif font-bold text-navy-900 text-lg leading-tight group-hover:text-gold-600 transition-colors">{{ $rec->title }}</h4>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-navy-950 text-white py-12 border-t border-navy-900">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0 text-center md:text-left">
                    <h5 class="text-2xl font-serif font-bold text-white mb-1">Humour<span class="text-gold-500">Resource</span></h5>
                    <p class="text-gray-500 text-sm">© {{ date('Y') }} NarrativeHR Excellence Platform.</p>
                </div>
                <div class="flex space-x-6 items-center">
                    <!-- LinkedIn -->
                    <a href="#" class="text-gray-500 hover:text-gold-500 transition-colors transform hover:scale-110 duration-200">
                        <span class="sr-only">LinkedIn</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                    <!-- Twitter / X -->
                    <a href="#" class="text-gray-500 hover:text-gold-500 transition-colors transform hover:scale-110 duration-200">
                        <span class="sr-only">Twitter</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                    <!-- Instagram -->
                    <a href="#" class="text-gray-500 hover:text-gold-500 transition-colors transform hover:scale-110 duration-200">
                        <span class="sr-only">Instagram</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
