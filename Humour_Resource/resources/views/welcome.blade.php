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
            
            <!-- Right: Visual (Atarah Style) -->
            <div class="hidden md:block relative group">
                <!-- Abstract Glow -->
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[120%] h-[120%] bg-gold-500/10 rounded-full blur-[100px] pointer-events-none"></div>
                
                <!-- Main Image -->
                <div class="relative z-10 rounded-2xl overflow-hidden shadow-2xl border border-white/10 transform transition-transform duration-700 group-hover:scale-[1.02]">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=2070&auto=format&fit=crop" 
                         alt="Strategic Boardroom" 
                         class="w-full h-auto object-cover grayscale-[20%] group-hover:grayscale-0 transition-all duration-700">
                    
                    <!-- Floating Badge -->
                    <div class="absolute bottom-8 left-8 bg-white/95 backdrop-blur px-6 py-4 rounded-lg shadow-xl border-l-4 border-gold-500 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <p class="text-navy-900 font-bold text-lg">150+ Companies</p>
                        <p class="text-gray-500 text-xs uppercase tracking-wide">Transformed</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- 1. Trust Strip (Clean White) -->
    <div class="bg-white border-b border-gray-100 py-12 overflow-hidden relative">
        <div class="container mx-auto px-6 mb-6 text-center">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Trusted by industry leaders</p>
        </div>
        <div class="relative w-full overflow-hidden">
            <div class="absolute left-0 top-0 bottom-0 w-32 bg-gradient-to-r from-white to-transparent z-10"></div>
            <div class="absolute right-0 top-0 bottom-0 w-32 bg-gradient-to-l from-white to-transparent z-10"></div>
            
            <div class="flex whitespace-nowrap animate-scroll hover:[animation-play-state:paused]">
                <div class="flex items-center space-x-20 mx-10">
                    @foreach(['TechFlow', 'Safaricom', 'Equity', 'Britam', 'Andela', 'Microsoft', 'Google'] as $brand)
                        <span class="text-2xl font-serif font-bold text-gray-300 hover:text-navy-900 transition-colors duration-300 cursor-default select-none">{{ $brand }}</span>
                    @endforeach
                </div>
                <div class="flex items-center space-x-20 mx-10">
                    @foreach(['TechFlow', 'Safaricom', 'Equity', 'Britam', 'Andela', 'Microsoft', 'Google'] as $brand)
                        <span class="text-2xl font-serif font-bold text-gray-300 hover:text-navy-900 transition-colors duration-300 cursor-default select-none">{{ $brand }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- 2. Services Grid (White Background / Navy Cards) -->
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
            try {
                return JSON.parse(jsonString);
            } catch (e) {
                return [];
            }
        }
    }">
        <div class="container mx-auto px-6">
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-5xl font-serif font-bold text-navy-900 mb-6">Our Expertise</h2>
                <div class="w-24 h-1 bg-gold-500 mx-auto rounded-full"></div>
                <p class="mt-6 text-gray-600 max-w-2xl mx-auto text-lg">Modular solutions designed to dismantle dysfunction and build resilience.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($services as $index => $service)
                <div @click="openModal({{ $index }})" 
                     class="group bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-500 ease-out hover:-translate-y-2 border-t-4 border-gold-500 relative overflow-hidden cursor-pointer">
                    
                    <!-- Icon Container -->
                    <div class="w-16 h-16 bg-navy-50 rounded-lg flex items-center justify-center mb-6 text-navy-900 group-hover:bg-navy-900 group-hover:text-gold-500 transition-colors duration-300">
                        @if(Str::contains(Str::lower($service->title), 'story'))
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path></svg>
                        @elseif(Str::contains(Str::lower($service->title), 'conflict'))
                             <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                        @elseif(Str::contains(Str::lower($service->title), 'map'))
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                        @else
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        @endif
                    </div>

                    <h3 class="text-xl font-bold text-navy-900 mb-3 font-serif group-hover:text-gold-600 transition-colors">{{ $service->title }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-6">
                        {{ $service->short_description }}
                    </p>
                    
                    <div class="flex items-center text-gold-600 font-bold text-xs uppercase tracking-widest group-hover:translate-x-2 transition-transform duration-300">
                        <span>Explore</span>
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Reusing Modal Logic (Same as before) -->
        <div x-show="serviceModalOpen" x-cloak class="fixed inset-0 z-[60] overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-navy-900/80 transition-opacity" @click="closeModal()"></div>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 relative">
                        <button @click="closeModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gold-500 transition-colors">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                            <h3 class="text-2xl leading-6 font-bold text-navy-900 font-serif mb-4" x-text="activeService ? activeService.title : ''"></h3>
                            <p class="text-sm text-gray-500 mb-6 italic" x-text="activeService ? activeService.short_description : ''"></p>
                            <div class="bg-gray-50 p-4 rounded-lg mb-6 border-l-4 border-gold-500">
                                <h4 class="text-xs font-bold text-navy-900 uppercase tracking-widest mb-3">Key Features:</h4>
                                <ul class="space-y-2">
                                    <template x-if="activeService">
                                        <template x-for="feature in parseDetails(activeService.full_details_json)" :key="feature">
                                            <li class="flex items-center text-sm text-gray-700">
                                                <svg class="w-4 h-4 text-gold-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                                <span x-text="feature.feature || feature"></span>
                                            </li>
                                        </template>
                                    </template>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse border-t border-gray-100">
                        <a href="{{ route('contact') }}" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gold-500 text-base font-medium text-navy-900 hover:bg-gold-400 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm transition-colors font-bold">
                            Book Consultation
                        </a>
                        <button @click="closeModal()" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm transition-colors">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Methodology (Dark Break) -->
    <section id="process" class="py-24 bg-navy-900 text-white overflow-hidden relative">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col md:flex-row gap-16">
                <div class="md:w-1/3">
                    <h2 class="text-3xl md:text-4xl font-serif font-bold text-white mb-6">The Narrative Method</h2>
                    <p class="text-gray-400 mb-8 leading-relaxed">
                        We don't do "cookie-cutter". Our four-step process is designed to unearth the unique story of your organization and rewrite the ending.
                    </p>
                    <a href="{{ route('contact') }}" class="text-gold-500 font-bold border-b-2 border-gold-500 hover:text-white hover:border-white transition-all pb-1 inline-block">
                        Schedule an Assessment
                    </a>
                </div>

                <div class="md:w-2/3 grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Step 1 -->
                    <div class="bg-navy-800 p-6 rounded-lg border border-white/5 hover:border-gold-500/50 transition-colors">
                        <span class="text-gold-500 text-5xl font-serif font-bold opacity-20 mb-2 block">01</span>
                        <h3 class="text-xl font-bold mb-2">Define Conflict</h3>
                        <p class="text-sm text-gray-400">Identifying the root causes of dysfunction through confidential stakeholder interviews.</p>
                    </div>
                    <!-- Step 2 -->
                    <div class="bg-navy-800 p-6 rounded-lg border border-white/5 hover:border-gold-500/50 transition-colors">
                        <span class="text-gold-500 text-5xl font-serif font-bold opacity-20 mb-2 block">02</span>
                        <h3 class="text-xl font-bold mb-2">Analyze Characters</h3>
                        <p class="text-sm text-gray-400">Mapping influence and resistance using psychometric profiling and network analysis.</p>
                    </div>
                    <!-- Step 3 -->
                    <div class="bg-navy-800 p-6 rounded-lg border border-white/5 hover:border-gold-500/50 transition-colors">
                        <span class="text-gold-500 text-5xl font-serif font-bold opacity-20 mb-2 block">03</span>
                        <h3 class="text-xl font-bold mb-2">Design Plot</h3>
                        <p class="text-sm text-gray-400">Co-creating a new operational narrative that aligns individual goals with corporate vision.</p>
                    </div>
                    <!-- Step 4 -->
                    <div class="bg-navy-800 p-6 rounded-lg border border-white/5 hover:border-gold-500/50 transition-colors">
                        <span class="text-gold-500 text-5xl font-serif font-bold opacity-20 mb-2 block">04</span>
                        <h3 class="text-xl font-bold mb-2">Deliver Resolution</h3>
                        <p class="text-sm text-gray-400">Implementation through workshops and coaching until the new story is self-sustaining.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Latest Stories (Gray Background) -->
    @php
        $counts = [
            'all' => $latestArticles->count(),
            'life' => $latestArticles->where('category_id', 1)->count(),
            'corporate' => $latestArticles->where('category_id', 2)->count(),
            'career' => $latestArticles->where('category_id', '!=', 1)->where('category_id', '!=', 2)->count(),
        ];
    @endphp
    <section id="stories" class="py-24 bg-gray-50" x-data="{ activeFilter: 'all', counts: {{ json_encode($counts) }} }">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-serif font-bold text-navy-900 mb-4">Latest Chronicles</h2>
                <div class="flex justify-center space-x-2">
                    <button @click="activeFilter = 'all'" :class="{ 'bg-gold-500 text-navy-900': activeFilter === 'all', 'bg-white text-gray-600 hover:bg-gray-100': activeFilter !== 'all' }" class="px-6 py-2 rounded-full text-sm font-bold transition-all shadow-sm">All</button>
                    <button @click="activeFilter = 'corporate'" :class="{ 'bg-gold-500 text-navy-900': activeFilter === 'corporate', 'bg-white text-gray-600 hover:bg-gray-100': activeFilter !== 'corporate' }" class="px-6 py-2 rounded-full text-sm font-bold transition-all shadow-sm">Corporate</button>
                    <button @click="activeFilter = 'life'" :class="{ 'bg-gold-500 text-navy-900': activeFilter === 'life', 'bg-white text-gray-600 hover:bg-gray-100': activeFilter !== 'life' }" class="px-6 py-2 rounded-full text-sm font-bold transition-all shadow-sm">Life</button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div x-show="counts[activeFilter] === 0" x-cloak class="col-span-3 text-center py-12">
                    <p class="text-gray-500 italic">No stories found in this category.</p>
                </div>

                @foreach($latestArticles as $article)
                @php
                    $catSlug = match($article->category_id) {
                        1 => 'life',
                        2 => 'corporate',
                        default => 'career'
                    };
                    $catName = match($article->category_id) {
                        1 => 'Life Issues',
                        2 => 'Corporate Chronicles',
                        default => 'Career Advice'
                    };
                @endphp
                
                <article x-show="activeFilter === 'all' || activeFilter === '{{ $catSlug }}'" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         class="group flex flex-col h-full bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    
                    <div class="h-64 overflow-hidden relative">
                         <div class="absolute inset-0 bg-navy-900/20 group-hover:bg-transparent transition-colors z-10"></div>
                         <img src="{{ Str::startsWith($article->image_path, ['http', 'https']) ? $article->image_path : asset('storage/' . $article->image_path) }}" 
                              alt="{{ $article->title }}" 
                              loading="lazy"
                              class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                         <span class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1 text-xs font-bold text-navy-900 rounded uppercase tracking-wider z-20">
                            {{ $catName }}
                         </span>
                    </div>
                    
                    <div class="p-8 flex flex-col flex-grow">
                        <h3 class="text-2xl font-serif font-bold text-navy-900 mb-4 leading-tight group-hover:text-gold-500 transition-colors">
                            <a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
                        </h3>
                        
                        <p class="text-gray-500 text-sm mb-6 flex-grow line-clamp-3 leading-relaxed">
                            {{ $article->excerpt }}
                        </p>
                        
                        <div class="flex justify-between items-center pt-6 border-t border-gray-100">
                            <span class="text-xs text-gray-400 font-medium">{{ $article->created_at->format('M d, Y') }}</span>
                            <a href="{{ route('articles.show', $article->slug) }}" class="text-gold-600 font-bold text-sm hover:text-navy-900 transition-colors flex items-center">
                                Read More <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials (Dark Navy) -->
    <section class="py-24 bg-navy-900 text-white relative overflow-hidden">
        <div class="container mx-auto px-6 relative z-10 text-center">
            <h2 class="text-3xl md:text-4xl font-serif font-bold mb-16">Impact Stories</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-left">
                @foreach($testimonials as $testimonial)
                <div class="bg-navy-800 p-8 rounded-xl border border-white/5 hover:border-gold-500 transition-colors relative">
                    <!-- Quote Icon -->
                    <div class="absolute -top-4 -left-4 text-gold-500 opacity-20 text-6xl font-serif">"</div>
                    <p class="text-gray-300 italic mb-6 relative z-10">
                        {{ $testimonial->quote }}
                    </p>
                    <div class="flex items-center mt-auto">
                        <div class="w-10 h-10 rounded-full bg-gold-500 flex items-center justify-center text-navy-900 font-bold mr-3">
                            {{ substr($testimonial->client_name, 0, 1) }}
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-sm">{{ $testimonial->client_name }}</h4>
                            <p class="text-xs text-gold-500">{{ $testimonial->company }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 5. Lead Magnet (Orange Gradient Pop) -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="bg-gradient-to-r from-gold-500 to-gold-400 rounded-3xl p-12 md:p-20 relative overflow-hidden shadow-2xl flex flex-col md:flex-row items-center text-center md:text-left">
                <!-- Abstract Pattern -->
                <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
                
                <div class="md:w-1/2 relative z-10 mb-8 md:mb-0">
                    <h2 class="text-3xl md:text-5xl font-serif font-bold text-navy-900 mb-4">Toxic Culture?</h2>
                    <p class="text-navy-900/80 font-medium text-xl">Get the exclusive guide: "The 5 Corporate Red Flags" sent to your inbox.</p>
                </div>
                
                <div class="md:w-1/2 w-full relative z-10" x-data="{ email: '', loading: false, message: '', submit() { this.loading = true; setTimeout(() => { this.loading = false; this.message = 'Check your inbox!'; }, 1500); } }">
                    <form @submit.prevent="submit" class="flex flex-col sm:flex-row gap-4">
                        <input x-model="email" type="email" placeholder="work@email.com" class="w-full px-6 py-4 rounded-xl border-0 ring-4 ring-white/30 focus:ring-white text-navy-900 placeholder-navy-900/50 font-medium shadow-lg" required>
                        <button class="bg-navy-900 text-white font-bold py-4 px-10 rounded-xl hover:bg-navy-800 transition-colors shadow-lg whitespace-nowrap">
                            <span x-show="!loading">Get the Guide</span>
                            <span x-show="loading" x-cloak>Sending...</span>
                        </button>
                    </form>
                    <p x-show="message" x-text="message" class="mt-4 text-navy-900 font-bold bg-white/20 inline-block px-4 py-1 rounded-full"></p>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. WhatsApp FAB -->
    <a href="#" class="fixed bottom-8 right-8 z-50 group">
        <div class="bg-whatsapp w-16 h-16 rounded-full flex items-center justify-center shadow-2xl hover:scale-110 transition-transform duration-300">
            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.888.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.978zm11.374-5.483c-.284-.142-1.681-1.082-1.941-1.206-.26-.124-.45-.187-.641.124-.191.311-.738 1.082-.905 1.305-.166.224-.332.25-.616.108-1.417-.711-2.616-1.543-3.666-3.344-.142-.249.014-.383.136-.503.111-.11.249-.286.374-.429.125-.143.166-.241.249-.407.083-.166.042-.311-.021-.436-.062-.124-.56-1.35-1.058-1.847-.49-.489-1.006-.411-1.378-.419-.342-.007-.732-.008-1.123-.008-.39 0-1.023.146-1.558.731-.535.584-2.043 1.996-2.043 4.868 0 2.872 2.091 5.647 2.383 6.062.292.415 4.114 6.281 9.965 8.803 3.999 1.724 5.567 1.382 6.556 1.293.989-.089 3.166-1.294 3.611-2.544.445-1.25.445-2.321.312-2.544-.133-.223-.489-.356-.773-.498z"/></svg>
        </div>
    </a>
</x-layout>