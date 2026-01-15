<x-layout>
    <!-- Hero Section -->
    <header class="relative bg-navy-900 text-white min-h-screen flex items-center pt-20 overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-gold-600 via-navy-900 to-navy-900"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5"></div>
        
        <div class="container mx-auto px-6 relative z-10 grid md:grid-cols-2 gap-12 items-center">
            <div x-data="{ shown: false }" x-init="setTimeout(() => shown = true, 200)" :class="{ 'opacity-100 translate-y-0': shown, 'opacity-0 translate-y-10': !shown }" class="transition-all duration-1000 ease-out">
                <div class="inline-block px-3 py-1 border border-gold-500/30 rounded-full bg-gold-500/10 text-gold-400 text-xs font-bold tracking-widest uppercase mb-6">
                    Redefining HR Consultancy
                </div>
                <h1 class="text-5xl md:text-7xl font-serif font-bold mb-6 leading-tight">
                    Corporate Strategy <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-gold-400 to-gold-600 italic">Meets Narrative</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-300 max-w-xl mb-10 font-light leading-relaxed">
                    We don't just fix policies; we rewrite the stories that drive your culture. Move beyond compliance into the era of human connection.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('services') }}" class="inline-flex justify-center items-center bg-gold-500 text-navy-900 font-bold py-4 px-8 rounded hover:bg-white transition-all duration-300 shadow-[0_0_20px_rgba(197,160,89,0.3)]">
                        Start Your Journey
                    </a>
                    <a href="{{ route('blog') }}" class="inline-flex justify-center items-center border border-white/20 text-white font-medium py-4 px-8 rounded hover:bg-white/5 transition-all duration-300">
                        Read Chronicles
                    </a>
                </div>
            </div>
            <!-- Abstract Visual -->
            <div class="hidden md:block relative">
                <div class="absolute top-0 right-0 w-96 h-96 bg-gold-500/20 rounded-full blur-3xl filter"></div>
                <img src="https://placehold.co/600x700/112240/C5A059?text=Visual+Metaphor" alt="Abstract HR Art" class="relative z-10 rounded-lg shadow-2xl border border-white/5 transform rotate-2 hover:rotate-0 transition-transform duration-700">
            </div>
        </div>
    </header>

    <!-- 1. Trust Strip (Infinite Scroll) -->
    <div class="bg-white border-b border-gray-100 py-10 overflow-hidden relative">
        <div class="container mx-auto px-6 mb-4">
            <p class="text-center text-xs font-bold text-gray-400 uppercase tracking-widest">Trusted by industry leaders</p>
        </div>
        <div class="relative w-full overflow-hidden">
            <!-- Fade Edges -->
            <div class="absolute left-0 top-0 bottom-0 w-20 bg-gradient-to-r from-white to-transparent z-10"></div>
            <div class="absolute right-0 top-0 bottom-0 w-20 bg-gradient-to-l from-white to-transparent z-10"></div>
            
            <div class="flex whitespace-nowrap animate-scroll hover:[animation-play-state:paused]">
                <!-- Logo Set 1 -->
                <div class="flex items-center space-x-16 mx-8">
                    @foreach(['TechFlow', 'Safaricom', 'Equity', 'Britam', 'Andela', 'Microsoft', 'Google'] as $brand)
                        <span class="text-2xl font-serif font-bold text-gray-300 hover:text-navy-900 transition-colors duration-300 cursor-default">{{ $brand }}</span>
                    @endforeach
                </div>
                <!-- Logo Set 2 (Duplicate for smooth loop) -->
                <div class="flex items-center space-x-16 mx-8">
                    @foreach(['TechFlow', 'Safaricom', 'Equity', 'Britam', 'Andela', 'Microsoft', 'Google'] as $brand)
                        <span class="text-2xl font-serif font-bold text-gray-300 hover:text-navy-900 transition-colors duration-300 cursor-default">{{ $brand }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- 2. Services Grid (with Quick-View Modals) -->
    <section id="expertise" class="py-24 bg-gray-50" 
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
            <div x-data="{ shown: false }" x-intersect.threshold.0.5="shown = true" :class="{ 'opacity-100 translate-y-0': shown, 'opacity-0 translate-y-10': !shown }" class="text-center mb-20 transition-all duration-700 ease-out">
                <h2 class="text-4xl md:text-5xl font-serif font-bold text-navy-900 mb-6">Our Expertise</h2>
                <div class="w-24 h-1 bg-gold-500 mx-auto rounded-full"></div>
                <p class="mt-6 text-gray-600 max-w-2xl mx-auto text-lg">Modular solutions designed to dismantle dysfunction and build resilience in modern organizations.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($services as $index => $service)
                <div @click="openModal({{ $index }})" 
                     x-data="{ shown: false }" x-intersect.threshold.0.1="setTimeout(() => shown = true, {{ $index * 150 }})" 
                     :class="{ 'opacity-100 translate-y-0': shown, 'opacity-0 translate-y-10': !shown }"
                     class="group bg-white p-8 rounded-sm shadow-sm hover:shadow-2xl transition-all duration-500 ease-out hover:-translate-y-2 border-t-4 border-transparent hover:border-gold-500 relative overflow-hidden cursor-pointer">
                    
                    <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
                        <svg class="w-24 h-24 text-navy-900" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zm0 9l2.5-1.25L12 8.75l-2.5 1.25L12 11zm0 2.5l-5-2.5-5 2.5L12 22l10-8.5-5-2.5-5 2.5z"/></svg>
                    </div>

                    <div class="w-14 h-14 bg-navy-50 rounded-full flex items-center justify-center mb-6 text-navy-900 group-hover:bg-navy-900 group-hover:text-gold-500 transition-colors duration-300">
                         <!-- Simple Logic for Icons -->
                        @if(Str::contains(Str::lower($service->title), 'story'))
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path></svg>
                        @elseif(Str::contains(Str::lower($service->title), 'conflict'))
                             <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                        @elseif(Str::contains(Str::lower($service->title), 'map'))
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                        @else
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        @endif
                    </div>

                    <h3 class="text-xl font-bold text-navy-900 mb-3 font-serif">{{ $service->title }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-6">
                        {{ $service->short_description }}
                    </p>
                    
                    <span class="text-xs font-bold text-gold-600 uppercase tracking-widest group-hover:underline">Quick View +</span>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Service Modal -->
        <div x-show="serviceModalOpen" x-cloak class="fixed inset-0 z-[60] overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                
                <!-- Backdrop -->
                <div x-show="serviceModalOpen" 
                     x-transition:enter="ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="fixed inset-0 bg-navy-900/80 transition-opacity" aria-hidden="true" @click="closeModal()"></div>

                <!-- Modal Panel -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div x-show="serviceModalOpen" 
                     x-transition:enter="ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave="ease-in duration-200"
                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                    
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 relative">
                        <!-- Close Button -->
                        <button @click="closeModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>

                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-2xl leading-6 font-bold text-navy-900 font-serif mb-4" id="modal-title" x-text="activeService ? activeService.title : ''"></h3>
                                
                                <p class="text-sm text-gray-500 mb-6 italic" x-text="activeService ? activeService.short_description : ''"></p>
                                
                                <div class="bg-gray-50 p-4 rounded-lg mb-6">
                                    <h4 class="text-xs font-bold text-navy-900 uppercase tracking-widest mb-3">What's Included:</h4>
                                    <ul class="space-y-2">
                                        <template x-if="activeService">
                                            <template x-for="feature in parseDetails(activeService.full_details_json)" :key="feature">
                                                <li class="flex items-center text-sm text-gray-600">
                                                    <svg class="w-4 h-4 text-gold-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                                    <span x-text="feature.feature || feature"></span>
                                                </li>
                                            </template>
                                        </template>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <a href="{{ route('contact') }}" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-navy-900 text-base font-medium text-white hover:bg-navy-800 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm transition-colors">
                            Book This Service
                        </a>
                        <button @click="closeModal()" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm transition-colors">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Interactive Methodology Visualizer (Tabs) -->
    <section id="process" class="py-24 bg-navy-900 text-white overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-serif font-bold text-white mb-4">The Narrative Method</h2>
                <p class="text-gray-400">How we move from chaos to clarity.</p>
            </div>

            <div x-data="{ activeTab: 'define' }" class="flex flex-col md:flex-row gap-12 items-start">
                <!-- Tabs List -->
                <div class="w-full md:w-1/3 flex flex-col space-y-4">
                    <button @click="activeTab = 'define'" :class="{ 'bg-gold-500 text-navy-900 border-gold-500': activeTab === 'define', 'border-white/20 text-gray-400 hover:border-gold-500/50': activeTab !== 'define' }" class="p-6 border-l-4 text-left transition-all duration-300 group">
                        <span class="text-xs font-bold uppercase tracking-wider block mb-1 opacity-70">Step 01</span>
                        <h3 class="text-xl font-bold">Define the Conflict</h3>
                    </button>
                    <button @click="activeTab = 'analyze'" :class="{ 'bg-gold-500 text-navy-900 border-gold-500': activeTab === 'analyze', 'border-white/20 text-gray-400 hover:border-gold-500/50': activeTab !== 'analyze' }" class="p-6 border-l-4 text-left transition-all duration-300">
                         <span class="text-xs font-bold uppercase tracking-wider block mb-1 opacity-70">Step 02</span>
                         <h3 class="text-xl font-bold">Analyze the Characters</h3>
                    </button>
                    <button @click="activeTab = 'design'" :class="{ 'bg-gold-500 text-navy-900 border-gold-500': activeTab === 'design', 'border-white/20 text-gray-400 hover:border-gold-500/50': activeTab !== 'design' }" class="p-6 border-l-4 text-left transition-all duration-300">
                         <span class="text-xs font-bold uppercase tracking-wider block mb-1 opacity-70">Step 03</span>
                         <h3 class="text-xl font-bold">Design the Plot</h3>
                    </button>
                    <button @click="activeTab = 'deliver'" :class="{ 'bg-gold-500 text-navy-900 border-gold-500': activeTab === 'deliver', 'border-white/20 text-gray-400 hover:border-gold-500/50': activeTab !== 'deliver' }" class="p-6 border-l-4 text-left transition-all duration-300">
                         <span class="text-xs font-bold uppercase tracking-wider block mb-1 opacity-70">Step 04</span>
                         <h3 class="text-xl font-bold">Deliver the Resolution</h3>
                    </button>
                </div>

                <!-- Tab Content -->
                <div class="w-full md:w-2/3 bg-navy-800 rounded-xl p-8 md:p-12 border border-white/5 relative min-h-[400px]">
                    
                    <!-- Define -->
                    <div x-show="activeTab === 'define'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" class="absolute inset-0 p-12">
                        <h3 class="text-3xl font-serif font-bold text-gold-500 mb-6">Diagnosing the Root Cause</h3>
                        <p class="text-gray-300 text-lg leading-relaxed mb-8">
                            Most HR problems are symptoms of a deeper narrative disconnect. We start by interviewing key stakeholders to uncover the unwritten rules governing your workplace.
                        </p>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-navy-900 p-4 rounded text-center"><span class="block text-2xl font-bold text-white mb-1">15+</span><span class="text-xs text-gray-500 uppercase">Interviews</span></div>
                            <div class="bg-navy-900 p-4 rounded text-center"><span class="block text-2xl font-bold text-white mb-1">100%</span><span class="text-xs text-gray-500 uppercase">Confidentiality</span></div>
                        </div>
                    </div>

                    <!-- Analyze -->
                    <div x-show="activeTab === 'analyze'" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" class="absolute inset-0 p-12">
                        <h3 class="text-3xl font-serif font-bold text-gold-500 mb-6">Mapping the Players</h3>
                        <p class="text-gray-300 text-lg leading-relaxed mb-8">
                            We use psychometric profiling and network analysis to understand who holds the influence, who blocks change, and who is your hidden champion.
                        </p>
                        <ul class="space-y-3">
                            <li class="flex items-center text-gray-300"><span class="w-2 h-2 bg-gold-500 rounded-full mr-3"></span>Personality Audits</li>
                            <li class="flex items-center text-gray-300"><span class="w-2 h-2 bg-gold-500 rounded-full mr-3"></span>Influence Mapping</li>
                        </ul>
                    </div>

                     <!-- Design -->
                     <div x-show="activeTab === 'design'" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" class="absolute inset-0 p-12">
                        <h3 class="text-3xl font-serif font-bold text-gold-500 mb-6">Scripting the Change</h3>
                        <p class="text-gray-300 text-lg leading-relaxed mb-8">
                            Strategy without story is just a memo. We co-create a new operational narrative that aligns individual goals with corporate vision.
                        </p>
                    </div>

                    <!-- Deliver -->
                    <div x-show="activeTab === 'deliver'" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" class="absolute inset-0 p-12">
                        <h3 class="text-3xl font-serif font-bold text-gold-500 mb-6">The New Reality</h3>
                        <p class="text-gray-300 text-lg leading-relaxed mb-8">
                            Implementation through workshops, coaching, and policy rewrites. We don't leave until the new story is self-sustaining.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- 3. Latest Stories (Intelligent Filter) -->
    @php
        $counts = [
            'all' => $latestArticles->count(),
            'life' => $latestArticles->where('category_id', 1)->count(),
            'corporate' => $latestArticles->where('category_id', 2)->count(),
            'career' => $latestArticles->where('category_id', '!=', 1)->where('category_id', '!=', 2)->count(),
        ];
    @endphp
    <section id="stories" class="py-24 bg-white" x-data="{ activeFilter: 'all', counts: {{ json_encode($counts) }} }">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16">
                <div>
                    <h2 class="text-4xl font-serif font-bold text-navy-900 mb-2">Latest Chronicles</h2>
                    <p class="text-gray-500">Unfiltered insights from the Humour Resource.</p>
                </div>
                
                <!-- Filter Buttons -->
                <div class="flex space-x-2 mt-6 md:mt-0 overflow-x-auto pb-2 md:pb-0">
                    <button @click="activeFilter = 'all'" :class="{ 'bg-navy-900 text-white': activeFilter === 'all', 'bg-gray-100 text-gray-600 hover:bg-gray-200': activeFilter !== 'all' }" class="px-5 py-2 rounded-full text-sm font-bold transition-all whitespace-nowrap">All Stories</button>
                    <button @click="activeFilter = 'corporate'" :class="{ 'bg-navy-900 text-white': activeFilter === 'corporate', 'bg-gray-100 text-gray-600 hover:bg-gray-200': activeFilter !== 'corporate' }" class="px-5 py-2 rounded-full text-sm font-bold transition-all whitespace-nowrap">Corporate</button>
                    <button @click="activeFilter = 'career'" :class="{ 'bg-navy-900 text-white': activeFilter === 'career', 'bg-gray-100 text-gray-600 hover:bg-gray-200': activeFilter !== 'career' }" class="px-5 py-2 rounded-full text-sm font-bold transition-all whitespace-nowrap">Career Advice</button>
                    <button @click="activeFilter = 'life'" :class="{ 'bg-navy-900 text-white': activeFilter === 'life', 'bg-gray-100 text-gray-600 hover:bg-gray-200': activeFilter !== 'life' }" class="px-5 py-2 rounded-full text-sm font-bold transition-all whitespace-nowrap">Life Issues</button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 min-h-[500px]">
                <!-- Empty State -->
                <div x-show="counts[activeFilter] === 0" x-cloak class="col-span-1 md:col-span-3 text-center py-20 flex flex-col items-center justify-center">
                    <div class="text-6xl mb-4 bg-gray-50 w-24 h-24 rounded-full flex items-center justify-center">📭</div>
                    <h3 class="text-2xl font-serif font-bold text-navy-900 mb-2">No stories found.</h3>
                    <p class="text-gray-500">We haven't written about this yet. Check back soon!</p>
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
                         class="group flex flex-col h-full bg-white rounded-lg overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300">
                    
                    <div class="h-56 overflow-hidden relative">
                         <div class="absolute inset-0 bg-navy-900/10 group-hover:bg-transparent transition-colors z-10"></div>
                         <img src="https://placehold.co/600x400/{{ $loop->index % 2 == 0 ? '112240' : '0A192F' }}/C5A059?text={{ urlencode(Str::limit($article->title, 10)) }}" 
                              alt="{{ $article->title }}" 
                              loading="lazy"
                              class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                    </div>
                    
                    <div class="p-8 flex flex-col flex-grow relative">
                        <!-- Floating Date -->
                        <div class="absolute -top-6 right-8 bg-gold-500 text-navy-900 font-bold px-3 py-1 text-xs rounded shadow-lg">
                            {{ $article->created_at->format('M d') }}
                        </div>

                        <div class="mb-4">
                            <span class="text-xs font-bold uppercase tracking-wider text-gold-600">{{ $catName }}</span>
                        </div>
                        
                        <h3 class="text-2xl font-serif font-bold text-navy-900 mb-4 leading-tight group-hover:text-gold-600 transition-colors">
                            <a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
                        </h3>
                        
                        <p class="text-gray-500 text-sm mb-6 flex-grow line-clamp-3 leading-relaxed">
                            {{ $article->excerpt }}
                        </p>
                        
                        <div class="flex justify-between items-center pt-6 border-t border-gray-100 mt-auto">
                            <span class="text-xs text-gray-400 font-medium">{{ $article->read_time }} min read</span>
                            <a href="{{ route('articles.show', $article->slug) }}" class="text-navy-900 font-bold text-sm hover:text-gold-600 transition-colors flex items-center">
                                Read Story <span class="ml-2 text-xl">&rarr;</span>
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials (Updated) -->
    <section id="testimonials" class="py-24 bg-navy-900 text-white relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-10"></div>
        <div class="container mx-auto px-6 relative z-10">
            <h2 class="text-3xl md:text-4xl font-serif font-bold text-center mb-16"><span class="text-gold-500">Voices</span> of Change</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($testimonials as $testimonial)
                <div class="bg-navy-800 p-8 rounded-xl border border-white/5 relative hover:border-gold-500/50 transition-all duration-300">
                    <p class="text-gray-300 italic mb-8 relative z-10 leading-relaxed">"{{ $testimonial->quote }}"</p>
                    <div class="flex items-center">
                        <img loading="lazy" src="{{ $testimonial->avatar_url }}" alt="{{ $testimonial->client_name }}" class="w-12 h-12 rounded-full border-2 border-gold-500 mr-4">
                        <div>
                            <h4 class="font-bold text-white text-sm">{{ $testimonial->client_name }}</h4>
                            <p class="text-xs text-gold-500 uppercase tracking-wide">{{ $testimonial->company }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 5. Lead Magnet Capture (AJAX Enabled) -->
    <section class="py-20 bg-gray-900 border-t border-gray-800" 
             x-data="{ 
                email: '', 
                loading: false, 
                message: '',
                status: null,
                submit() {
                    this.loading = true;
                    this.message = '';
                    this.status = null;
                    
                    fetch('{{ route('newsletter.subscribe') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                        },
                        body: JSON.stringify({ email: this.email })
                    })
                    .then(response => response.json().then(data => ({ status: response.status, body: data })))
                    .then(({ status, body }) => {
                        this.loading = false;
                        if (status >= 200 && status < 300) {
                            this.message = body.message;
                            this.status = 'success';
                            this.email = '';
                        } else {
                            this.message = body.message || 'Something went wrong. Please check your email.';
                            if(body.errors && body.errors.email) {
                                this.message = body.errors.email[0];
                            }
                            this.status = 'error';
                        }
                    })
                    .catch(() => {
                        this.loading = false;
                        this.message = 'Network error. Please try again.';
                        this.status = 'error';
                    });
                }
            }">
        <div class="container mx-auto px-6">
            <div class="bg-gradient-to-r from-gold-600 to-gold-400 rounded-2xl p-10 md:p-16 flex flex-col md:flex-row items-center justify-between relative overflow-hidden shadow-2xl">
                <!-- Decorative Circle -->
                <div class="absolute -right-20 -top-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
                
                <div class="md:w-1/2 relative z-10 text-navy-900 mb-8 md:mb-0 text-center md:text-left">
                    <h2 class="text-3xl md:text-4xl font-serif font-bold mb-4">Don't Let Toxic Culture Win</h2>
                    <p class="text-navy-900/80 font-medium text-lg">Get our exclusive guide: <span class="font-bold underline">"The 5 Corporate Red Flags"</span> sent straight to your inbox.</p>
                </div>
                
                <div class="md:w-1/2 w-full relative z-10">
                    <form @submit.prevent="submit" class="flex flex-col sm:flex-row gap-3">
                        <input x-model="email" type="email" placeholder="Enter your work email..." required 
                               class="w-full px-6 py-4 rounded-lg bg-white/90 border-0 focus:ring-2 focus:ring-navy-900 text-navy-900 placeholder-gray-500 disabled:opacity-50"
                               :disabled="loading">
                        <button type="submit" :disabled="loading" 
                                class="bg-navy-900 text-white font-bold py-4 px-8 rounded-lg hover:bg-navy-800 transition-colors whitespace-nowrap shadow-lg disabled:opacity-75 disabled:cursor-wait flex items-center justify-center min-w-[180px]">
                            <span x-show="!loading">Send Me The Guide</span>
                            <span x-show="loading" x-cloak class="flex items-center">
                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Sending...
                            </span>
                        </button>
                    </form>
                    
                    <div x-show="message" x-cloak class="mt-4 p-3 rounded text-sm font-bold text-center sm:text-left" 
                         :class="status === 'success' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'">
                        <span x-text="message"></span>
                    </div>

                    <p x-show="!message" class="text-navy-900/60 text-xs mt-3 text-center md:text-left">No spam. Just hard truths. Unsubscribe anytime.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. WhatsApp FAB -->
    <a href="#" class="fixed bottom-6 right-6 z-50 group">
        <span class="absolute right-14 top-2 bg-white text-gray-800 text-xs font-bold px-3 py-1 rounded shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">Chat with us</span>
        <div class="bg-whatsapp w-14 h-14 rounded-full flex items-center justify-center shadow-[0_4px_14px_rgba(37,211,102,0.4)] hover:scale-110 transition-transform duration-300 animate-pulse-slow">
            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.888.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.978zm11.374-5.483c-.284-.142-1.681-1.082-1.941-1.206-.26-.124-.45-.187-.641.124-.191.311-.738 1.082-.905 1.305-.166.224-.332.25-.616.108-1.417-.711-2.616-1.543-3.666-3.344-.142-.249.014-.383.136-.503.111-.11.249-.286.374-.429.125-.143.166-.241.249-.407.083-.166.042-.311-.021-.436-.062-.124-.56-1.35-1.058-1.847-.49-.489-1.006-.411-1.378-.419-.342-.007-.732-.008-1.123-.008-.39 0-1.023.146-1.558.731-.535.584-2.043 1.996-2.043 4.868 0 2.872 2.091 5.647 2.383 6.062.292.415 4.114 6.281 9.965 8.803 3.999 1.724 5.567 1.382 6.556 1.293.989-.089 3.166-1.294 3.611-2.544.445-1.25.445-2.321.312-2.544-.133-.223-.489-.356-.773-.498z"/></svg>
        </div>
    </a>
</x-layout>
