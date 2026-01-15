<x-layout>
    <header class="relative bg-navy-900 text-white pt-32 pb-20 overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-gold-600 via-navy-900 to-navy-900 opacity-20"></div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <h1 class="text-5xl md:text-6xl font-serif font-bold mb-6">Let's Talk</h1>
            <div class="w-24 h-1 bg-gold-500 mx-auto rounded-full"></div>
        </div>
    </header>

    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row gap-16 max-w-6xl mx-auto">
                <!-- Info -->
                <div class="lg:w-1/3 bg-navy-50 p-10 rounded-lg h-fit border-l-4 border-gold-500">
                    <h3 class="text-2xl font-serif font-bold text-navy-900 mb-8">Contact Info</h3>
                    
                    <div class="space-y-6">
                        <div>
                            <span class="block text-xs font-bold text-gold-600 uppercase tracking-widest mb-1">Email</span>
                            <a href="mailto:hello@humourresource.com" class="text-lg text-gray-800 hover:text-navy-900">hello@humourresource.com</a>
                        </div>
                        <div>
                            <span class="block text-xs font-bold text-gold-600 uppercase tracking-widest mb-1">Phone</span>
                            <p class="text-lg text-gray-800">+254 700 123 456</p>
                        </div>
                        <div>
                            <span class="block text-xs font-bold text-gold-600 uppercase tracking-widest mb-1">Office</span>
                            <p class="text-lg text-gray-800">Nairobi, Kenya</p>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <div class="lg:w-2/3">
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">First Name</label>
                                <input type="text" class="w-full border-gray-300 rounded focus:ring-gold-500 focus:border-gold-500 bg-gray-50">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Last Name</label>
                                <input type="text" class="w-full border-gray-300 rounded focus:ring-gold-500 focus:border-gold-500 bg-gray-50">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Email Address</label>
                            <input type="email" class="w-full border-gray-300 rounded focus:ring-gold-500 focus:border-gold-500 bg-gray-50">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Message</label>
                            <textarea rows="5" class="w-full border-gray-300 rounded focus:ring-gold-500 focus:border-gold-500 bg-gray-50"></textarea>
                        </div>
                        <button type="submit" class="bg-navy-900 text-white font-bold py-4 px-10 rounded hover:bg-gold-500 hover:text-navy-900 transition-all shadow-lg">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>