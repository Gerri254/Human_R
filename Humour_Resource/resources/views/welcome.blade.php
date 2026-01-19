<x-layout>
    <!-- Hero Section -->
    <header class="relative bg-navy-900 text-white min-h-[90vh] flex items-center pt-20 overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-gold-500 via-navy-900 to-navy-900"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5"></div>
        
        <div class="container mx-auto px-6 relative z-10 grid md:grid-cols-2 gap-16 items-center">
            <!-- Left: Text -->
            <div x-data="{ shown: false }" x-init="setTimeout(() => shown = true, 200)" :class="{ 'opacity-100 translate-y-0': shown, 'opacity-0 translate-y-10': !shown }" class="transition-all duration-1000 ease-out">
                <div class="inline-flex items-center space-x-2 px-3 py-1 border border-gold-500/30 rounded-full bg-gold-500/10 text-gold-500 text-xs font-bold tracking-widest uppercase mb-6">
                    <span class="w-2 h-2 rounded-full bg-gold-500 animate-pulse"></span>
                    <span>Redefining HR Consultancy</span>
                </div>
                <h1 class="text-5xl md:text-7xl font-serif font-bold mb-6 leading-tight">
                    Corporate Strategy <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-gold-400 to-gold-600 italic">Meets Narrative</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-300 max-w-xl mb-10 font-light leading-relaxed">
                    We don't just fix policies; we rewrite the stories that drive your culture. Move beyond compliance into the era of human connection.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('services') }}" class="inline-flex justify-center items-center bg-gold-500 text-navy-900 font-bold py-4 px-8 rounded hover:bg-white transition-all duration-300 shadow-[0_0_20px_rgba(255,166,77,0.4)] transform hover:-translate-y-1">
                        Start Your Journey
                    </a>
                    <a href="{{ route('blog') }}" class="inline-flex justify-center items-center border border-white/20 text-white font-medium py-4 px-8 rounded hover:bg-white/5 transition-all duration-300">
                        Read Chronicles
                    </a>
                </div>
            </div>
            
            <!-- Right: Visual -->
            <div class="hidden md:block relative group">
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[120%] h-[120%] bg-gold-500/10 rounded-full blur-[100px] pointer-events-none"></div>
                <div class="relative z-10 rounded-2xl overflow-hidden shadow-2xl border border-white/10 transform transition-transform duration-700 group-hover:scale-[1.02]">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=2070&auto=format&fit=crop" 
                         alt="Strategic Boardroom" 
                         class="w-full h-auto object-cover grayscale-[20%] group-hover:grayscale-0 transition-all duration-700">
                    <div class="absolute bottom-8 left-8 bg-white/95 backdrop-blur px-6 py-4 rounded-lg shadow-xl border-l-4 border-gold-500 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <p class="text-navy-900 font-bold text-lg">150+ Companies</p>
                        <p class="text-gray-500 text-xs uppercase tracking-wide">Transformed</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- 1. Trust Strip (Text-Based Premium) -->
    <div class="bg-white border-b border-gray-100 py-12 overflow-hidden relative">
        <div class="container mx-auto px-6 mb-8 text-center text-gray-400">
            <p class="text-[9px] font-bold uppercase tracking-[0.5em] opacity-60">Institutional Partners</p>
        </div>
        <div class="relative w-full overflow-hidden">
            <!-- Fade Edges -->
            <div class="absolute left-0 top-0 bottom-0 w-40 bg-gradient-to-r from-white to-transparent z-10"></div>
            <div class="absolute right-0 top-0 bottom-0 w-40 bg-gradient-to-l from-white to-transparent z-10"></div>
            
            <div class="flex whitespace-nowrap animate-scroll hover:[animation-play-state:paused]">
                <!-- Group 1 -->
                <div class="flex items-center space-x-32 mx-16 pr-32">
                    @foreach(['Safaricom', 'Equity', 'Microsoft', 'Britam', 'Andela', 'Google', 'TechFlow', 'Spotify', 'LinkedIn'] as $brand)
                        <span class="text-2xl font-serif font-bold text-gray-300 hover:text-navy-900 transition-colors duration-500 cursor-default select-none">{{ $brand }}</span>
                    @endforeach
                </div>
                <!-- Group 2 -->
                <div class="flex items-center space-x-32 mx-16 pr-32">
                    @foreach(['Safaricom', 'Equity', 'Microsoft', 'Britam', 'Andela', 'Google', 'TechFlow', 'Spotify', 'LinkedIn'] as $brand)
                        <span class="text-2xl font-serif font-bold text-gray-300 hover:text-navy-900 transition-colors duration-500 cursor-default select-none">{{ $brand }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- 2. Services Grid -->
    <section id="expertise" class="py-24 bg-white" 
        @keydown.escape.window="serviceModalOpen = false"
        x-data="{ 
        services: {{ $services->toJson() }}, 
        activeService: null, 
        serviceModalOpen: false,
        openModal(index) {
            this.activeService = this.services[index];
            this.serviceModalOpen = true;
            document.body.classList.add('overflow-hidden');
        },
        closeModal() {
            this.serviceModalOpen = false;
            document.body.classList.remove('overflow-hidden');
        },
        parseDetails(jsonString) {
            try { return JSON.parse(jsonString); } catch (e) { return []; }
        }
    }">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl md:text-5xl font-serif font-bold text-navy-900 mb-6">Our Expertise</h2>
            <div class="w-24 h-1 bg-gold-500 mx-auto rounded-full"></div>
            <p class="mt-6 text-gray-600 max-w-2xl mx-auto text-lg mb-20">Modular solutions designed to dismantle dysfunction and build resilience.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($services as $index => $service)
                <div @click="openModal({{ $index }})" 
                     class="group bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-500 ease-out hover:-translate-y-2 border-t-4 border-gold-500 relative cursor-pointer text-left">
                    <div class="w-16 h-16 bg-navy-50 rounded-lg flex items-center justify-center mb-6 text-navy-900 group-hover:bg-navy-900 group-hover:text-gold-500 transition-colors duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-navy-900 mb-3 font-serif">{{ $service->title }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-6">{{ $service->short_description }}</p>
                    <div class="flex items-center text-gold-600 font-bold text-xs uppercase tracking-widest group-hover:translate-x-2 transition-transform duration-300">
                        <span>Explore</span>
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Modal Structure remains similar but cleaner -->
        <div x-show="serviceModalOpen" x-cloak class="fixed inset-0 z-[60] overflow-y-auto" role="dialog" aria-modal="true">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-navy-900/80 transition-opacity" @click="closeModal()"></div>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                    <div class="bg-white px-8 pt-8 pb-6 relative text-left">
                        <h3 class="text-2xl font-bold text-navy-900 font-serif mb-4" x-text="activeService ? activeService.title : ''"></h3>
                        <p class="text-sm text-gray-500 mb-6 italic" x-text="activeService ? activeService.short_description : ''"></p>
                        <div class="bg-gray-50 p-6 rounded-lg mb-6 border-l-4 border-gold-500">
                            <h4 class="text-xs font-bold text-navy-900 uppercase tracking-widest mb-4">Core Deliverables:</h4>
                            <ul class="space-y-3">
                                <template x-if="activeService">
                                    <template x-for="feature in parseDetails(activeService.full_details_json)" :key="feature">
                                        <li class="flex items-center text-sm text-gray-700">
                                            <svg class="w-4 h-4 text-gold-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                            <span x-text="feature.feature || feature"></span>
                                        </li>
                                    </template>
                                </template>
                            </ul>
                        </div>
                        <div class="flex flex-col sm:flex-row-reverse gap-3">
                            <a href="{{ route('contact') }}" class="w-full text-center bg-gold-500 text-navy-900 font-bold py-3 px-6 rounded hover:bg-gold-400 transition-colors">Book Consultation</a>
                            <button @click="closeModal()" class="w-full text-center border border-gray-300 text-gray-700 py-3 px-6 rounded hover:bg-gray-50">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Methodology (Break) -->
    <section id="process" class="py-24 bg-navy-900 text-white relative">
        <div class="container mx-auto px-6 flex flex-col md:flex-row gap-16">
            <div class="md:w-1/3">
                <h2 class="text-4xl font-serif font-bold mb-6">The Narrative Method</h2>
                <p class="text-gray-400 mb-8 leading-relaxed">Identifying root causes of dysfunction and co-creating a new operational story.</p>
                <a href="{{ route('contact') }}" class="text-gold-500 font-bold border-b-2 border-gold-500 hover:text-white pb-1 transition-all">Schedule Assessment</a>
            </div>
            <div class="md:w-2/3 grid grid-cols-1 sm:grid-cols-2 gap-6">
                @foreach(['Define Conflict', 'Analyze Characters', 'Design Plot', 'Deliver Resolution'] as $i => $step)
                <div class="bg-navy-800 p-8 rounded-lg border border-white/5 hover:border-gold-500/30 transition-colors">
                    <span class="text-gold-500/20 text-6xl font-serif font-bold mb-2 block">0{{ $i+1 }}</span>
                    <h3 class="text-xl font-bold mb-2">{{ $step }}</h3>
                    <p class="text-sm text-gray-400">Strategic intervention designed to transform organizational behavior.</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 3. Chronicles (Light Gray) -->
    <section id="stories" class="py-24 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-serif font-bold text-navy-900 mb-4">Latest Chronicles</h2>
                <div class="w-20 h-1 bg-gold-500 mx-auto"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @foreach($latestArticles as $article)
                <article class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300">
                    <div class="h-64 overflow-hidden relative">
                         <img src="{{ Str::startsWith($article->image_path, ['http', 'https']) ? $article->image_path : asset('storage/' . $article->image_path) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                         <span class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1 text-[10px] font-black text-navy-900 rounded uppercase tracking-widest">Case Study</span>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-serif font-bold text-navy-900 mb-4 leading-tight group-hover:text-gold-600 transition-colors">
                            <a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
                        </h3>
                        <p class="text-gray-500 text-sm mb-6 line-clamp-3 leading-relaxed">{{ $article->excerpt }}</p>
                        <a href="{{ route('articles.show', $article->slug) }}" class="text-gold-600 font-bold text-xs uppercase tracking-widest flex items-center group-hover:translate-x-1 transition-transform">
                            Read More <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-24 bg-navy-900 text-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-serif font-bold mb-16">Impact Stories</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-left">
                @foreach($testimonials as $testimonial)
                <div class="bg-navy-800 p-8 rounded-xl border border-white/5 relative">
                    <p class="text-gray-300 italic mb-6 leading-relaxed">"{{ $testimonial->quote }}"</p>
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-gold-500 flex items-center justify-center text-navy-900 font-bold mr-3">{{ substr($testimonial->client_name, 0, 1) }}</div>
                        <div><h4 class="font-bold text-sm">{{ $testimonial->client_name }}</h4><p class="text-xs text-gold-500">{{ $testimonial->company }}</p></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 7. Physical Location (Atarah Style) -->
    <section class="bg-gray-50 py-24 border-t border-gray-100 overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-serif font-bold text-navy-900 mb-4">Our Global Hub</h2>
                <div class="w-24 h-1 bg-gold-500 mx-auto mb-6"></div>
                <p class="text-gray-500 max-w-xl mx-auto">Experience the Narrative Method firsthand at our strategy centre in the heart of Nairobi.</p>
                <p class="text-navy-900 font-bold mt-4 flex items-center justify-center">
                    <svg class="w-5 h-5 text-gold-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    The Mirage, Tower 2, Westlands, Nairobi
                </p>
            </div>
            
            <!-- Map back in container with significantly increased height -->
            <div class="w-full h-[900px] rounded-[3rem] overflow-hidden shadow-2xl border-8 border-white ring-1 ring-gray-200 grayscale-[0.8] hover:grayscale-0 transition-all duration-1000 ease-in-out">
                <iframe 
                    width="100%" 
                    height="100%" 
                    frameborder="0" 
                    scrolling="no" 
                    marginheight="0" 
                    marginwidth="0" 
                    src="https://maps.google.com/maps?q=The%20Mirage%20Westlands%20Nairobi&t=&z=16&ie=UTF8&iwloc=&output=embed">
                </iframe>
            </div>
        </div>
    </section>

    <!-- Lead Magnet -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="bg-navy-900 rounded-[2rem] p-12 md:p-20 relative overflow-hidden shadow-2xl flex flex-col md:flex-row items-center">
                <div class="absolute right-0 top-0 w-1/2 h-full bg-gold-500/10 skew-x-12 translate-x-20"></div>
                <div class="md:w-1/2 relative z-10 text-white mb-8 md:mb-0">
                    <h2 class="text-4xl font-serif font-bold mb-4 text-gold-500">Toxic Culture?</h2>
                    <p class="text-gray-300 text-xl">Get the exclusive guide: <span class="font-bold text-white">"The 5 Corporate Red Flags"</span></p>
                </div>
                <div class="md:w-1/2 w-full relative z-10">
                    <form class="flex flex-col sm:flex-row gap-4">
                        <input type="email" placeholder="work@email.com" class="w-full px-6 py-4 rounded-xl bg-navy-800 border-navy-700 text-white focus:ring-gold-500 shadow-inner">
                        <button class="bg-gold-500 text-navy-900 font-bold py-4 px-10 rounded-xl hover:bg-gold-400 transition-colors shadow-lg">Get It Now</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>