<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>VIP Portal - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-navy-900 min-h-screen flex items-center justify-center font-sans antialiased text-white">
    
    <div class="w-full max-w-md p-8">
        <div class="bg-navy-800 border border-gold-500/30 rounded-lg shadow-[0_0_40px_rgba(197,160,89,0.15)] p-10 relative overflow-hidden">
            <!-- Decorative Elements -->
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-gold-500/10 rounded-full blur-2xl"></div>
            <div class="absolute bottom-0 left-0 -mb-4 -ml-4 w-32 h-32 bg-gold-500/5 rounded-full blur-3xl"></div>

            <div class="text-center mb-10 relative z-10">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-navy-900 border border-gold-500 mb-6 text-gold-500">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                </div>
                <h1 class="text-3xl font-serif font-bold text-white mb-2">Executive Vault</h1>
                <p class="text-gold-500/80 text-sm tracking-wider uppercase">Authorized Personnel Only</p>
            </div>

            <form method="POST" action="{{ route('portal.authenticate') }}" class="space-y-6 relative z-10">
                @csrf
                <div>
                    <label for="access_code" class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Access Code</label>
                    <input type="password" name="access_code" id="access_code" required 
                           class="w-full bg-navy-900 border border-gold-500/50 rounded-md px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-gold-500 focus:border-transparent transition-all"
                           placeholder="Enter VIP Passkey">
                    @error('access_code')
                        <p class="mt-2 text-red-400 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full bg-gold-500 hover:bg-gold-400 text-navy-900 font-bold py-3 px-4 rounded transition-colors duration-300 shadow-lg">
                    Unlock Portal
                </button>
            </form>
        </div>
        
        <p class="text-center text-gray-600 text-xs mt-8">&copy; {{ date('Y') }} Humour Resource. All rights reserved.</p>
    </div>

</body>
</html>
