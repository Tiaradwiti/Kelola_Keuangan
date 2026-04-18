<x-guest-layout>
    <div class="fixed inset-0 -z-10 bg-[#fbfdfa] overflow-hidden">
        <div class="absolute inset-x-0 top-0 h-[30rem] bg-[radial-gradient(circle_at_top,rgba(205,234,184,0.3),transparent_70%)]"></div>
        <div class="absolute left-[-6rem] bottom-16 h-64 w-64 rounded-full bg-[#f6d989]/30 blur-3xl"></div>
        <div class="absolute right-[-5rem] top-10 h-80 w-80 rounded-full bg-[#cdeab8]/50 blur-3xl"></div>
    </div>

    <div class="relative min-h-[100dvh] flex flex-col items-center justify-center px-6 py-10">
        
        <div class="mb-8 text-center">
            <a href="/" class="inline-flex flex-col items-center gap-2 no-underline">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-[#245437] to-[#4fa35f] text-xl text-white shadow-lg shadow-emerald-900/20">
                    &#10047;
                </div>
                <div class="mt-2">
                    <p class="font-display text-xl font-bold text-[#245437]">Mulai Menanam</p>
                    <p class="text-[#4fa35f] text-[9px] uppercase tracking-[0.3em] font-semibold">Buka Lahan Tabungan Baru</p>
                </div>
            </a>
        </div>

        <div class="w-full max-w-[450px] bg-white/80 backdrop-blur-xl border border-white rounded-[2.5rem] p-8 shadow-[0_24px_70px_rgba(36,84,55,0.08)]">
            
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="name" class="block text-[11px] font-bold uppercase tracking-widest text-[#245437]/60 ml-1 mb-2">Nama Pemilik Kebun</label>
                    <input id="name" 
                        class="block w-full px-5 py-4 rounded-2xl border-[#e8f3e3] bg-white focus:border-[#4fa35f] focus:ring focus:ring-[#cdeab8]/50 transition-all placeholder-[#c0d1b9] text-[#245437]" 
                        type="text" name="name" :value="old('name')" 
                        required autofocus placeholder="Nama lengkapmu" />
                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs" />
                </div>

                <div>
                    <label for="email" class="block text-[11px] font-bold uppercase tracking-widest text-[#245437]/60 ml-1 mb-2">Alamat Email</label>
                    <input id="email" 
                        class="block w-full px-5 py-4 rounded-2xl border-[#e8f3e3] bg-white focus:border-[#4fa35f] focus:ring focus:ring-[#cdeab8]/50 transition-all placeholder-[#c0d1b9] text-[#245437]" 
                        type="email" name="email" :value="old('email')" 
                        required placeholder="nanam@duit.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs" />
                </div>

                <div>
                    <label for="password" class="block text-[11px] font-bold uppercase tracking-widest text-[#245437]/60 ml-1 mb-2">Kunci Pagar (Password)</label>
                    <input id="password" 
                        class="block w-full px-5 py-4 rounded-2xl border-[#e8f3e3] bg-white focus:border-[#4fa35f] focus:ring focus:ring-[#cdeab8]/50 transition-all placeholder-[#c0d1b9]"
                        type="password" name="password"
                        required placeholder="Minimal 8 karakter" />
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs" />
                </div>

                <div>
                    <label for="password_confirmation" class="block text-[11px] font-bold uppercase tracking-widest text-[#245437]/60 ml-1 mb-2">Ulangi Kunci Pagar</label>
                    <input id="password_confirmation" 
                        class="block w-full px-5 py-4 rounded-2xl border-[#e8f3e3] bg-white focus:border-[#4fa35f] focus:ring focus:ring-[#cdeab8]/50 transition-all placeholder-[#c0d1b9]"
                        type="password" name="password_confirmation" 
                        required placeholder="Konfirmasi password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-xs" />
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-6 py-4 bg-gradient-to-r from-[#245437] to-[#4fa35f] text-white font-bold text-lg rounded-2xl hover:shadow-lg hover:shadow-emerald-900/20 active:scale-95 transition-all duration-200">
                        MULAI BERKEBUN 🌿
                    </button>
                </div>

                <div class="text-center pt-2">
                    <a class="text-sm font-medium text-[#4fa35f] hover:text-[#245437] transition-colors" href="{{ route('login') }}">
                        Sudah punya lahan? <span class="font-bold underline decoration-[#f2b544] underline-offset-4">Masuk di sini</span>
                    </a>
                </div>
            </form>
        </div>

        <p class="mt-8 text-[10px] font-bold uppercase tracking-[0.4em] text-[#245437] opacity-40">Garden Finance Engine v1.0</p>
    </div>

    <style>
        .font-display { font-family: 'Fraunces', serif; }
        body { font-family: 'Sora', sans-serif; overflow-x: hidden; }
        
        /* Reset Breeze Default */
        .min-h-screen { background-color: transparent !important; padding: 0 !important; }
        .sm:max-w-md { max-width: 100% !important; }
        .bg-gray-100 { background-color: transparent !important; }
    </style>
</x-guest-layout>