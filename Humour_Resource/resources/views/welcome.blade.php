<x-layout>
    <!-- Hero Section (Atarah Style - Centered Authority) -->
    <header class="relative bg-navy-900 text-white min-h-screen flex items-center justify-center overflow-hidden" x-data="{ activeSlide: 0, slides: ['Corporate Strategy Meets Narrative', 'Fixing Toxic Workplace Culture', 'Building Resilient Leaders'] }" x-init="setInterval(() => activeSlide = (activeSlide + 1) % slides.length, 4000)">
        
        <!-- Dynamic Background Image (Parallax) -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=2301&auto=format&fit=crop" class="w-full h-full object-cover opacity-40 animate-pulse-slow" alt="Background">
            <!-- Heavy Navy Overlay for Readability -->
            <div class="absolute inset-0 bg-gradient-to-b from-navy-900/90 via-navy-900/80 to-navy-900"></div>
        </div>

        <!-- Animated Background Elements -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-gold-500/10 rounded-full blur-[128px] animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-navy-700/30 rounded-full blur-[128px]"></div>
        </div>
        
        <!-- Centered Content -->
        <div class="container mx-auto px-6 relative z-10 text-center">
            
            <!-- Rotating Heading -->
            <div class="h-40 md:h-56 relative mb-10">
                <template x-for="(slide, index) in slides" :key="index">
                    <h1 x-show="activeSlide === index"
                        x-transition:enter="transition ease-out duration-1000 delay-300"
                        x-transition:enter-start="opacity-0 translate-y-12 scale-95"
                        x-transition:enter-end="opacity-90 translate-y-0 scale-100"
                        x-transition:leave="transition ease-in duration-500"
                        x-transition:leave-start="opacity-90 scale-100"
                        x-transition:leave-end="opacity-0 -translate-y-12 scale-105"
                        class="absolute inset-0 flex items-center justify-center text-5xl md:text-7xl font-serif font-black leading-[1.1] tracking-tight drop-shadow-xl"
                    >
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-gray-300 via-white/90 to-gold-500/80 pb-2" x-text="slide"></span>
                    </h1>
                </template>
            </div>

            <!-- Subtext -->
            <div class="max-w-2xl mx-auto mb-12 border-l-2 border-gold-500/50 pl-8 text-left md:text-center md:border-l-0 md:pl-0">
                <p class="text-xl md:text-2xl text-gray-200 font-light leading-relaxed drop-shadow-md">
                    We don't just fix policies; we <span class="text-gold-400 italic font-serif">rewrite the stories</span> that drive your culture. 
                    Move beyond compliance into the <span class="text-white font-medium border-b border-gold-500/30">era of human connection.</span>
                </p>
            </div>

            <!-- Dual CTA Buttons -->
            <div class="flex flex-col sm:flex-row justify-center gap-6">
                <a href="{{ route('contact') }}" class="inline-flex justify-center items-center bg-gold-500 text-navy-900 font-bold py-4 px-10 rounded hover:bg-white transition-all duration-300 shadow-[0_0_30px_rgba(255,166,77,0.4)] transform hover:-translate-y-1 text-sm uppercase tracking-widest">
                    Start Your Journey
                </a>
                <a href="{{ route('services') }}" class="inline-flex justify-center items-center border border-white/20 text-white font-bold py-4 px-10 rounded hover:bg-white/10 transition-all duration-300 text-sm uppercase tracking-widest backdrop-blur-sm">
                    Explore Solutions
                </a>
            </div>
        </div>
    </header>

    <!-- 1. Trust Strip (Strictly ICON-ONLY with Wide Spacing) -->
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
                    @foreach(['Safaricom', 'Equity', 'Microsoft', 'Absa', 'KCB', 'Britam', 'Andela', 'Google', 'TechFlow', 'Spotify', 'LinkedIn', 'Oracle', 'Jubilee'] as $brand)
                        <span class="text-2xl font-serif font-bold text-gray-300 hover:text-navy-900 transition-colors duration-500 cursor-default select-none">{{ $brand }}</span>
                    @endforeach
                </div>
                <!-- Group 2 -->
                <div class="flex items-center space-x-32 mx-16 pr-32">
                    @foreach(['Safaricom', 'Equity', 'Microsoft', 'Absa', 'KCB', 'Britam', 'Andela', 'Google', 'TechFlow', 'Spotify', 'LinkedIn', 'Oracle', 'Jubilee'] as $brand)
                        <span class="text-2xl font-serif font-bold text-gray-300 hover:text-navy-900 transition-colors duration-500 cursor-default select-none">{{ $brand }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- 1.5. Our Narrative (About Us - Atarah Style) -->
    <section class="py-24 bg-white overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center gap-16">
                <!-- Left: Text Content -->
                <div class="md:w-1/2 relative z-10">
                    <div class="inline-flex items-center space-x-2 mb-6">
                        <span class="w-12 h-[2px] bg-gold-500"></span>
                        <span class="text-gold-500 font-bold uppercase tracking-widest text-xs">Our Narrative</span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-serif font-bold text-navy-900 mb-8 leading-tight">
                        We Don't Just Consult.<br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-gold-600 to-gold-400">We Rewrite Reality.</span>
                    </h2>
                    <p class="text-gray-500 text-lg leading-relaxed mb-8">
                        For over a decade, Humour Resource has been the silent architect behind some of Nairobi's most resilient corporate cultures. We believe that every organization is a story, and every employee is a character waiting for a better plot.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-8 border-t border-gray-100 pt-8">
                        <div>
                            <h4 class="text-navy-900 font-bold text-xl mb-2 flex items-center">
                                <svg class="w-5 h-5 text-gold-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                Our Mission
                            </h4>
                            <p class="text-sm text-gray-500">To dismantle toxic workplace dynamics through radical honesty and strategic narrative intervention.</p>
                        </div>
                        <div>
                            <h4 class="text-navy-900 font-bold text-xl mb-2 flex items-center">
                                <svg class="w-5 h-5 text-gold-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                Our Vision
                            </h4>
                            <p class="text-sm text-gray-500">A corporate world where "Human Resources" actually emphasizes the Human.</p>
                        </div>
                    </div>
                    
                    <div class="mt-10">
                        <a href="{{ route('about') }}" class="text-navy-900 font-bold border-b-2 border-gold-500 hover:text-gold-600 hover:border-navy-900 transition-all pb-1 inline-flex items-center group">
                            Read Our Full Story 
                            <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- Right: Visual with Badge -->
                <div class="md:w-1/2 relative">
                    <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-navy-50 rounded-full z-0"></div>
                    <div class="absolute -left-4 -top-4 w-24 h-24 bg-gold-500/10 rounded-full z-0 blur-xl"></div>
                    
                    <div class="relative z-10 rounded-tr-[4rem] rounded-bl-[4rem] overflow-hidden shadow-2xl transform hover:scale-[1.01] transition-transform duration-700">
                        <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?q=80&w=1932&auto=format&fit=crop" 
                             alt="Consulting Team" 
                             class="w-full h-[500px] object-cover">
                        
                        <!-- Experience Badge -->
                        <div class="absolute bottom-0 right-0 bg-navy-900 text-white p-8 rounded-tl-[2rem]">
                            <div class="text-center">
                                <span class="block text-5xl font-serif font-bold text-gold-500">10+</span>
                                <span class="block text-xs uppercase tracking-widest mt-2 font-medium opacity-80">Years of<br>Excellence</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 1.6. Core Values (Atarah Style - Navy Band) -->
    <section class="py-24 bg-navy-900 text-white relative overflow-hidden">
        <!-- Subtle Pattern -->
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16">
                <p class="text-gold-500 font-bold uppercase tracking-[0.2em] text-xs mb-4">Our DNA</p>
                <h2 class="text-3xl md:text-4xl font-serif font-bold">The Values That Drive Us</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Value 1 -->
                <div class="group bg-navy-800 p-8 rounded-xl border border-white/5 hover:border-gold-500 transition-all duration-300 hover:-translate-y-2">
                    <div class="w-12 h-12 bg-white/5 rounded-lg flex items-center justify-center mb-6 group-hover:bg-gold-500 transition-colors">
                        <svg class="w-6 h-6 text-gold-500 group-hover:text-navy-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 font-serif">Radical Honesty</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">We speak the truths that others whisper. Change starts with facing reality.</p>
                </div>

                <!-- Value 2 -->
                <div class="group bg-navy-800 p-8 rounded-xl border border-white/5 hover:border-gold-500 transition-all duration-300 hover:-translate-y-2">
                    <div class="w-12 h-12 bg-white/5 rounded-lg flex items-center justify-center mb-6 group-hover:bg-gold-500 transition-colors">
                        <svg class="w-6 h-6 text-gold-500 group-hover:text-navy-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 font-serif">Strategic Empathy</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">Understanding the 'Why' behind every employee behavior is our superpower.</p>
                </div>

                <!-- Value 3 -->
                <div class="group bg-navy-800 p-8 rounded-xl border border-white/5 hover:border-gold-500 transition-all duration-300 hover:-translate-y-2">
                    <div class="w-12 h-12 bg-white/5 rounded-lg flex items-center justify-center mb-6 group-hover:bg-gold-500 transition-colors">
                        <svg class="w-6 h-6 text-gold-500 group-hover:text-navy-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 font-serif">Narrative Precision</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">We don't guess. We map your organizational story with data-backed accuracy.</p>
                </div>

                <!-- Value 4 -->
                <div class="group bg-navy-800 p-8 rounded-xl border border-white/5 hover:border-gold-500 transition-all duration-300 hover:-translate-y-2">
                    <div class="w-12 h-12 bg-white/5 rounded-lg flex items-center justify-center mb-6 group-hover:bg-gold-500 transition-colors">
                        <svg class="w-6 h-6 text-gold-500 group-hover:text-navy-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 font-serif">Unapologetic Growth</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">We push you out of your comfort zone because that's where the magic happens.</p>
                </div>
            </div>
        </div>
    </section>

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

        <!-- 2.5. Impact Stats (Kenyan Context - High Visibility) -->
        <section class="py-16 bg-navy-900 text-white border-y-4 border-gold-500 my-12 relative overflow-hidden">
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-20"></div>
            <div class="container mx-auto px-6 relative z-10">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-12">
                    <!-- Stat 1 -->
                    <div class="text-center group">
                        <span class="block text-4xl md:text-5xl font-serif font-bold text-gold-500 mb-2 group-hover:scale-110 transition-transform duration-300">120+</span>
                        <span class="block text-[10px] uppercase tracking-[0.3em] text-gray-300 font-bold group-hover:text-white transition-colors">Culture Audits</span>
                    </div>
                    <!-- Stat 2 -->
                    <div class="text-center group">
                        <span class="block text-4xl md:text-5xl font-serif font-bold text-gold-500 mb-2 group-hover:scale-110 transition-transform duration-300">8.5k</span>
                        <span class="block text-[10px] uppercase tracking-[0.3em] text-gray-300 font-bold group-hover:text-white transition-colors">Staff Empowered</span>
                    </div>
                    <!-- Stat 3 -->
                    <div class="text-center group">
                        <span class="block text-4xl md:text-5xl font-serif font-bold text-gold-500 mb-2 group-hover:scale-110 transition-transform duration-300">15+</span>
                        <span class="block text-[10px] uppercase tracking-[0.3em] text-gray-300 font-bold group-hover:text-white transition-colors">Industries Led</span>
                    </div>
                    <!-- Stat 4 -->
                    <div class="text-center group">
                        <span class="block text-4xl md:text-5xl font-serif font-bold text-gold-500 mb-2 group-hover:scale-110 transition-transform duration-300">100%</span>
                        <span class="block text-[10px] uppercase tracking-[0.3em] text-gray-300 font-bold group-hover:text-white transition-colors">Discretion Rate</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Service Modal -->
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

    <!-- 2.5. Competitive Edge (Why Us - Atarah Style) -->
    <section class="py-24 bg-gray-50 border-t border-gray-200">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16">
                <div class="md:w-1/2">
                    <p class="text-gold-600 font-bold uppercase tracking-[0.2em] text-xs mb-4">Why Partner With Us?</p>
                    <h2 class="text-3xl md:text-4xl font-serif font-bold text-navy-900">The Humour Resource Edge</h2>
                </div>
                <div class="md:w-1/3 mt-6 md:mt-0">
                    <p class="text-gray-500 text-sm leading-relaxed">
                        We bridge the gap between hard data and soft skills. Our interventions are measurable, discreet, and tailored to your specific narrative.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Edge 1 -->
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 group">
                    <div class="w-14 h-14 bg-navy-50 rounded-full flex items-center justify-center mb-6 text-navy-900 group-hover:bg-navy-900 group-hover:text-gold-500 transition-colors">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-navy-900 mb-3">Scientific Approach</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-4">We use psychometric profiling and network analysis. No guesswork, just data-driven human insights.</p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-xs text-navy-800 font-medium"><svg class="w-3 h-3 text-gold-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>Behavioral Mapping</li>
                        <li class="flex items-center text-xs text-navy-800 font-medium"><svg class="w-3 h-3 text-gold-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>Impact Metrics</li>
                    </ul>
                </div>

                <!-- Edge 2 -->
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 group">
                    <div class="w-14 h-14 bg-navy-50 rounded-full flex items-center justify-center mb-6 text-navy-900 group-hover:bg-navy-900 group-hover:text-gold-500 transition-colors">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-navy-900 mb-3">Absolute Discretion</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-4">Toxic cultures thrive on fear. We create safe containers for truth-telling, ensuring complete anonymity.</p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-xs text-navy-800 font-medium"><svg class="w-3 h-3 text-gold-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>Confidential Audits</li>
                        <li class="flex items-center text-xs text-navy-800 font-medium"><svg class="w-3 h-3 text-gold-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>NDA Protected</li>
                    </ul>
                </div>

                <!-- Edge 3 -->
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 group">
                    <div class="w-14 h-14 bg-navy-50 rounded-full flex items-center justify-center mb-6 text-navy-900 group-hover:bg-navy-900 group-hover:text-gold-500 transition-colors">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-navy-900 mb-3">Sustainable Change</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-4">We don't just fix the symptom; we rewrite the code so the bug doesn't come back. Long-term results.</p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-xs text-navy-800 font-medium"><svg class="w-3 h-3 text-gold-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>Self-Healing Teams</li>
                        <li class="flex items-center text-xs text-navy-800 font-medium"><svg class="w-3 h-3 text-gold-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>Resilience Training</li>
                    </ul>
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