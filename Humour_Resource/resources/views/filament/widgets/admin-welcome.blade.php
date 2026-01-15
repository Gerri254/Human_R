<x-filament::section class="bg-slate-900 text-white border-t-4 border-amber-500">
    <div class="flex items-center gap-6">
        <!-- Visual Accent -->
        <div class="hidden md:flex h-16 w-16 bg-amber-500/20 rounded-full items-center justify-center text-amber-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.90 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
            </svg>
        </div>

        <div class="flex-1">
            <h2 class="text-2xl font-bold tracking-tight text-white mb-1 font-serif">
                Welcome to the Command Center
            </h2>
            <p class="text-slate-400">
                Here is what's happening with <span class="text-amber-500 font-bold">Humour Resource</span> today.
            </p>
        </div>

        <div class="flex flex-col sm:flex-row gap-3">
            <a href="/admin/articles/create" 
               class="inline-flex items-center justify-center gap-2 px-4 py-2 text-sm font-bold text-slate-900 bg-amber-500 rounded-lg hover:bg-amber-400 transition-colors shadow-lg hover:shadow-amber-500/20">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                  <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                </svg>
                Write New Story
            </a>

            <a href="/admin/testimonials/create" 
               class="inline-flex items-center justify-center gap-2 px-4 py-2 text-sm font-bold text-white bg-slate-800 border border-slate-700 rounded-lg hover:bg-slate-700 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-amber-500">
                  <path d="M7 8a3 3 0 100-6 3 3 0 000 6zM14.5 9a2.5 2.5 0 100-5 2.5 2.5 0 000 5zM1.615 16.428a1.224 1.224 0 01-.569-1.175 6.002 6.002 0 0111.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 017 18a9.953 9.953 0 01-5.385-1.572zM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 00-1.588-3.755 4.502 4.502 0 015.874 2.636.818.818 0 01-.36.98A7.465 7.465 0 0114.5 16z" />
                </svg>
                Add Client
            </a>
        </div>
    </div>
</x-filament::section>
