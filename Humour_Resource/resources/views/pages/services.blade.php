<x-layout>
    <header class="relative bg-navy-900 text-white pt-32 pb-20 overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-gold-600 via-navy-900 to-navy-900 opacity-20"></div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <h1 class="text-5xl md:text-6xl font-serif font-bold mb-6">Our Expertise</h1>
            <p class="text-gray-300 max-w-2xl mx-auto text-lg">Modular solutions tailored to your organization's unique narrative.</p>
        </div>
    </header>

    <section class="py-24 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($services as $service)
                <div class="bg-white p-8 rounded-sm shadow-sm hover:shadow-2xl transition-all duration-300 border-t-4 border-gold-500 flex flex-col group">
                    <div class="w-16 h-16 bg-navy-50 rounded-full flex items-center justify-center mb-6 text-navy-900 group-hover:bg-navy-900 group-hover:text-gold-500 transition-colors">
                         {{-- Simple icon placeholder since dynamic icon rendering requires blade components or svg logic --}}
                         <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-serif font-bold text-navy-900 mb-4">{{ $service->title }}</h3>
                    <p class="text-gray-600 mb-8 flex-grow">{{ $service->short_description }}</p>
                    
                    <div class="bg-gray-50 p-6 rounded mb-8">
                        <h4 class="text-xs font-bold text-navy-900 uppercase tracking-widest mb-4">Includes:</h4>
                        <ul class="space-y-2">
                            @if(is_array($service->full_details_json))
                                @foreach($service->full_details_json as $detail)
                                    <li class="flex items-start text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-gold-500 mr-2 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                        {{ is_array($detail) ? ($detail['feature'] ?? json_encode($detail)) : $detail }}
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    
                    <a href="{{ route('contact') }}" class="block text-center w-full bg-navy-900 text-white font-bold py-4 rounded hover:bg-gold-500 hover:text-navy-900 transition-colors">
                        Book Now
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</x-layout>