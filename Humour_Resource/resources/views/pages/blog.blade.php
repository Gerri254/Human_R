<x-layout>
    <header class="relative bg-navy-900 text-white pt-32 pb-20 overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-gold-600 via-navy-900 to-navy-900 opacity-20"></div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <h1 class="text-5xl md:text-6xl font-serif font-bold mb-6">The Chronicles</h1>
            
            <div class="max-w-xl mx-auto mt-8 relative">
                <input type="text" placeholder="Search stories..." class="w-full py-4 px-6 rounded-full bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:bg-navy-900 focus:border-gold-500 transition-all">
                <svg class="w-6 h-6 text-gray-400 absolute right-6 top-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
        </div>
    </header>

    <section class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach($articles as $article)
                @php
                    $catName = match($article->category_id) {
                        1 => 'Life Issues',
                        2 => 'Corporate Chronicles',
                        default => 'Career Advice'
                    };
                @endphp
                <article class="group flex flex-col h-full bg-white rounded-lg overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300">
                    <div class="h-56 overflow-hidden relative">
                         <div class="absolute inset-0 bg-navy-900/10 group-hover:bg-transparent transition-colors z-10"></div>
                         <img src="https://placehold.co/600x400/{{ $loop->index % 2 == 0 ? '112240' : '0A192F' }}/C5A059?text={{ urlencode(Str::limit($article->title, 10)) }}" 
                              alt="{{ $article->title }}" 
                              loading="lazy"
                              class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                    </div>
                    
                    <div class="p-8 flex flex-col flex-grow relative">
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

            <div class="mt-16">
                {{ $articles->links() }}
            </div>
        </div>
    </section>
</x-layout>