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

    <!-- Navigation (Atarah Style - Centered Menu + Right Actions) -->
    <nav x-data="{ scrolled: false }" 
         @scroll.window="scrolled = (window.pageYOffset > 50)"
         :class="{ 'bg-navy-900/95 backdrop-blur-md shadow-lg py-4': scrolled, 'bg-transparent py-6': !scrolled }"
         class="fixed w-full z-50 transition-all duration-500 border-b border-white/10">
        <div class="container mx-auto px-6 flex justify-between items-center relative">
            
            <!-- 1. Logo (Left) -->
            <a href="{{ route('home') }}" class="text-2xl font-serif font-bold tracking-wide text-white relative z-50 group">
                Humour<span class="text-gold-500 group-hover:text-white transition-colors duration-300">Resource</span>
            </a>
            
            <!-- 2. Centered Menu (Desktop) -->
            <div class="hidden md:flex absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 space-x-20 text-sm font-bold tracking-widest uppercase text-white/80">
                <a href="{{ route('home') }}" class="hover:text-gold-500 transition-colors relative group {{ request()->routeIs('home') ? 'text-gold-500' : '' }}">
                    Home
                    <span class="absolute -bottom-2 left-0 w-0 h-0.5 bg-gold-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('about') }}" class="hover:text-gold-500 transition-colors relative group {{ request()->routeIs('about') ? 'text-gold-500' : '' }}">
                    About
                    <span class="absolute -bottom-2 left-0 w-0 h-0.5 bg-gold-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('services') }}" class="hover:text-gold-500 transition-colors relative group {{ request()->routeIs('services') ? 'text-gold-500' : '' }}">
                    Services
                    <span class="absolute -bottom-2 left-0 w-0 h-0.5 bg-gold-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('blog') }}" class="hover:text-gold-500 transition-colors relative group {{ request()->routeIs('blog') ? 'text-gold-500' : '' }}">
                    Chronicles
                    <span class="absolute -bottom-2 left-0 w-0 h-0.5 bg-gold-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
            </div>

            <!-- 3. Right Actions (Desktop) -->
            <div class="hidden md:flex items-center space-x-6">
                <!-- Client Portal Link -->
                <a href="{{ route('portal.login') }}" class="text-xs font-bold uppercase tracking-widest text-white/60 hover:text-white transition-colors flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    Portal
                </a>
                <!-- CTA Button -->
                <a href="{{ route('contact') }}" class="px-6 py-2.5 bg-gold-500 text-navy-900 font-bold text-xs uppercase tracking-widest rounded shadow-[0_0_15px_rgba(255,166,77,0.4)] hover:bg-white hover:text-navy-900 transition-all transform hover:-translate-y-0.5">
                    Book Strategy
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

    <!-- Footer (Atarah Style - 4 Column) -->
    <footer class="bg-navy-900 text-white border-t border-gold-500/20 pt-20 pb-10">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
                <!-- Col 1: Brand -->
                <div>
                    <h3 class="text-2xl font-serif font-bold mb-6 text-white">Humour<span class="text-gold-500">Resource</span></h3>
                    <p class="text-gray-400 mb-6 leading-relaxed text-sm">
                        Strategic HR consultancy transforming corporate cultures through the power of narrative and psychological safety.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-gold-500 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gold-500 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Col 2: Quick Links -->
                <div>
                    <h4 class="text-lg font-bold mb-6 text-white border-b border-gold-500/30 pb-2 inline-block">Quick Links</h4>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li><a href="{{ route('home') }}" class="hover:text-gold-500 transition-colors">Home</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-gold-500 transition-colors">About Us</a></li>
                        <li><a href="{{ route('services') }}" class="hover:text-gold-500 transition-colors">Methodology</a></li>
                        <li><a href="{{ route('blog') }}" class="hover:text-gold-500 transition-colors">The Chronicles</a></li>
                        <li><a href="{{ route('portal.login') }}" class="hover:text-gold-500 transition-colors">Client Portal</a></li>
                    </ul>
                </div>

                <!-- Col 3: Services -->
                <div>
                    <h4 class="text-lg font-bold mb-6 text-white border-b border-gold-500/30 pb-2 inline-block">Core Services</h4>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-gold-500 transition-colors">Culture Transformation</a></li>
                        <li><a href="#" class="hover:text-gold-500 transition-colors">Executive Coaching</a></li>
                        <li><a href="#" class="hover:text-gold-500 transition-colors">Conflict Resolution</a></li>
                        <li><a href="#" class="hover:text-gold-500 transition-colors">Narrative Strategy</a></li>
                    </ul>
                </div>

                <!-- Col 4: Contact -->
                <div>
                    <h4 class="text-lg font-bold mb-6 text-white border-b border-gold-500/30 pb-2 inline-block">Get In Touch</h4>
                    <ul class="space-y-4 text-sm text-gray-400">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-gold-500 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span>Westlands, Nairobi, Kenya<br>The Mirage, Tower 2</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-gold-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span>+254 700 123 456</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-gold-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <span>hello@humourresource.com</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center text-xs text-gray-500 uppercase tracking-widest">
                <p>&copy; {{ date('Y') }} Humour Resource. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
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