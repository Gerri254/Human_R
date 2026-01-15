<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Humour Resource | Narrative HR Strategy' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Alpine.js & Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Styles / Tailwind -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            serif: ['"Playfair Display"', 'serif'],
                            sans: ['"Inter"', 'sans-serif'],
                        },
                        colors: {
                            navy: {
                                900: '#0A192F',
                                800: '#112240',
                                700: '#233554',
                            },
                            gold: {
                                400: '#D4AF37',
                                500: '#C5A059',
                                600: '#B08D55',
                            },
                            whatsapp: '#25D366'
                        },
                        animation: {
                            'scroll': 'scroll 30s linear infinite',
                            'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        },
                        keyframes: {
                            scroll: {
                                '0%': { transform: 'translateX(0)' },
                                '100%': { transform: 'translateX(-50%)' },
                            }
                        }
                    }
                }
            }
        </script>
    @endif
    
    <style>
        [x-cloak] { display: none !important; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        
        /* Typography Theme Overrides for Prose */
        .prose h2, .prose h3 { font-family: 'Playfair Display', serif; color: #112240; margin-top: 2em; margin-bottom: 0.5em; }
        .prose p { margin-bottom: 1.5em; line-height: 1.8; color: #4B5563; }
        .prose strong { color: #0A192F; font-weight: 700; }
        .prose ul { list-style-type: disc; padding-left: 1.5em; margin-bottom: 1.5em; }
        .prose li { margin-bottom: 0.5em; }
        .prose blockquote { border-left: 4px solid #C5A059; padding-left: 1em; font-style: italic; color: #4B5563; background: #F9FAFB; padding: 1.5rem; border-radius: 0 0.5rem 0.5rem 0; }
    </style>
</head>
<body class="font-sans antialiased text-gray-800 bg-white overflow-x-hidden" x-data="{ mobileMenuOpen: false }">

    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-navy-900/95 backdrop-blur-sm border-b border-white/10 transition-all duration-300">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center relative z-50">
            <a href="{{ route('home') }}" class="text-2xl font-serif font-bold tracking-wide text-white relative z-50">
                Humour<span class="text-gold-500">Resource</span>
            </a>
            
            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8 text-sm font-medium tracking-widest uppercase items-center">
                <a href="{{ route('about') }}" class="text-gray-300 hover:text-gold-500 transition-colors {{ request()->routeIs('about') ? 'text-gold-500' : '' }}">About</a>
                <a href="{{ route('services') }}" class="text-gray-300 hover:text-gold-500 transition-colors {{ request()->routeIs('services') ? 'text-gold-500' : '' }}">Services</a>
                <a href="{{ route('blog') }}" class="text-gray-300 hover:text-gold-500 transition-colors {{ request()->routeIs('blog') ? 'text-gold-500' : '' }}">Narratives</a>
                <a href="{{ route('contact') }}" class="px-6 py-2 border border-gold-500 text-gold-500 hover:bg-gold-500 hover:text-navy-900 transition-all rounded-sm {{ request()->routeIs('contact') ? 'bg-gold-500 text-navy-900' : '' }}">
                    Get in Touch
                </a>
            </div>

            <!-- Mobile Button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-white focus:outline-none relative z-50">
                <svg x-show="!mobileMenuOpen" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                <svg x-show="mobileMenuOpen" x-cloak class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <!-- Mobile Menu Overlay (Full Screen) -->
        <div x-show="mobileMenuOpen" x-cloak 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-x-full"
             x-transition:enter-end="opacity-100 translate-x-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-x-0"
             x-transition:leave-end="opacity-0 translate-x-full"
             class="fixed inset-0 z-40 bg-navy-900/98 backdrop-blur-md flex items-center justify-center md:hidden">
            
            <div class="flex flex-col space-y-8 text-center">
                <a @click="mobileMenuOpen = false" href="{{ route('home') }}" class="text-2xl font-serif text-white hover:text-gold-500 transition-colors transform hover:scale-110 duration-200">Home</a>
                <a @click="mobileMenuOpen = false" href="{{ route('about') }}" class="text-2xl font-serif text-white hover:text-gold-500 transition-colors transform hover:scale-110 duration-200">About</a>
                <a @click="mobileMenuOpen = false" href="{{ route('services') }}" class="text-2xl font-serif text-white hover:text-gold-500 transition-colors transform hover:scale-110 duration-200">Services</a>
                <a @click="mobileMenuOpen = false" href="{{ route('blog') }}" class="text-2xl font-serif text-white hover:text-gold-500 transition-colors transform hover:scale-110 duration-200">Narratives</a>
                <a @click="mobileMenuOpen = false" href="{{ route('contact') }}" class="inline-block px-8 py-4 border-2 border-gold-500 text-gold-500 font-bold text-xl rounded-full hover:bg-gold-500 hover:text-navy-900 transition-all mt-4">
                    Book Session
                </a>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    {{ $slot }}

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

    <!-- WhatsApp FAB (Optional: Keeping it as it was in original design) -->
    <a href="#" class="fixed bottom-6 right-6 z-50 group">
        <span class="absolute right-14 top-2 bg-white text-gray-800 text-xs font-bold px-3 py-1 rounded shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">Chat with us</span>
        <div class="bg-whatsapp w-14 h-14 rounded-full flex items-center justify-center shadow-[0_4px_14px_rgba(37,211,102,0.4)] hover:scale-110 transition-transform duration-300 animate-pulse-slow">
            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.888.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.978zm11.374-5.483c-.284-.142-1.681-1.082-1.941-1.206-.26-.124-.45-.187-.641.124-.191.311-.738 1.082-.905 1.305-.166.224-.332.25-.616.108-1.417-.711-2.616-1.543-3.666-3.344-.142-.249.014-.383.136-.503.111-.11.249-.286.374-.429.125-.143.166-.241.249-.407.083-.166.042-.311-.021-.436-.062-.124-.56-1.35-1.058-1.847-.49-.489-1.006-.411-1.378-.419-.342-.007-.732-.008-1.123-.008-.39 0-1.023.146-1.558.731-.535.584-2.043 1.996-2.043 4.868 0 2.872 2.091 5.647 2.383 6.062.292.415 4.114 6.281 9.965 8.803 3.999 1.724 5.567 1.382 6.556 1.293.989-.089 3.166-1.294 3.611-2.544.445-1.25.445-2.321.312-2.544-.133-.223-.489-.356-.773-.498z"/></svg>
        </div>
    </a>

</body>
</html>