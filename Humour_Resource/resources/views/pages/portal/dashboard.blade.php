<x-layout>
    <!-- Hero Section -->
    <header class="bg-navy-900 text-white py-20 border-b border-gold-500/20">
        <div class="container mx-auto px-6 text-center">
            <span class="inline-block px-3 py-1 mb-4 rounded-full bg-gold-500/10 border border-gold-500/30 text-gold-400 text-xs font-bold uppercase tracking-widest">
                Client Portal
            </span>
            <h1 class="text-4xl md:text-5xl font-serif font-bold text-white mb-6">The Executive Vault</h1>
            <p class="text-xl text-gray-400 max-w-2xl mx-auto font-light">
                Access your exclusive resources, templates, and strategic documents.
            </p>
        </div>
    </header>

    <!-- Resources Grid -->
    <section class="py-16 bg-gray-50 min-h-[60vh]">
        <div class="container mx-auto px-6">
            
            @if($resources->isEmpty())
                <div class="text-center py-20">
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gray-200 mb-6">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-navy-900">The Vault is Empty</h3>
                    <p class="text-gray-500 mt-2">Check back later for new resources.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($resources as $resource)
                        <div class="bg-white rounded-lg border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 overflow-hidden group">
                            <div class="p-8">
                                <div class="flex items-start justify-between mb-6">
                                    <div class="p-3 rounded-lg 
                                        {{ $resource->type === 'video' ? 'bg-red-50 text-red-600' : '' }}
                                        {{ $resource->type === 'document' ? 'bg-blue-50 text-blue-600' : '' }}
                                        {{ $resource->type === 'template' ? 'bg-green-50 text-green-600' : '' }}
                                    ">
                                        @if($resource->type === 'video')
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        @elseif($resource->type === 'template')
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>
                                        @else
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        @endif
                                    </div>
                                    <span class="text-xs font-bold uppercase tracking-wider text-gray-400 bg-gray-50 px-2 py-1 rounded">
                                        {{ ucfirst($resource->type) }}
                                    </span>
                                </div>

                                <h3 class="text-xl font-bold text-navy-900 mb-3 group-hover:text-gold-600 transition-colors">
                                    {{ $resource->title }}
                                </h3>
                                
                                <p class="text-gray-500 text-sm leading-relaxed mb-6 line-clamp-3">
                                    {{ $resource->description }}
                                </p>

                                <a href="{{ asset('storage/' . $resource->file_path) }}" download class="inline-flex items-center justify-center w-full bg-navy-900 text-white font-bold py-3 px-4 rounded hover:bg-gold-500 hover:text-navy-900 transition-colors duration-300">
                                    <span>Download / Access</span>
                                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</x-layout>
