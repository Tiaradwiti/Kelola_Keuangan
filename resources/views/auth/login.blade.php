<x-guest-layout>
    <div class="fixed inset-0 bg-[#F0FDF4] overflow-y-auto antialiased">
        <div class="fixed top-[-10%] left-[-20%] w-[60%] h-[30%] bg-yellow-200/50 rounded-full blur-3xl"></div>
        <div class="fixed bottom-[-5%] right-[-10%] w-[50%] h-[25%] bg-emerald-200/40 rounded-full blur-3xl"></div>

        <div class="relative min-h-[100dvh] flex flex-col items-center justify-between px-6 py-10">
            
            <div class="w-full text-center mt-4">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-white rounded-[2rem] shadow-xl shadow-emerald-100 mb-6 animate-bounce">
                    <span class="text-4xl">🌱</span>
                </div>
                <h1 class="text-3xl font-black text-emerald-900 tracking-tight">Garden of Savings</h1>
                <p class="text-emerald-600 font-medium mt-2 text-sm">Ayo siram benih tabunganmu! ✨</p>
            </div>

            <div class="w-full max-w-sm bg-white/70 backdrop-blur-xl rounded-[3rem] p-8 shadow-[0_20px_50px_rgba(5,150,105,0.1)] border border-white/50 my-8">
                
                <x-auth-session-status class="mb-4 text-center" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div class="relative">
                        <label for="email" class="text-[11px] font-bold uppercase tracking-widest text-emerald-700 ml-4 mb-1 block">Alamat Email</label>
                        <input id="email" 
                            class="block w-full h-14 px-6 rounded-3xl border-2 border-emerald-50 focus:border-emerald-400 focus:ring-4 focus:ring-emerald-100 transition-all bg-white/80 placeholder-emerald-200 text-emerald-900 font-medium" 
                            type="email" name="email" :value="old('email')" 
                            required autofocus placeholder="nanam@duit.com" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 px-4" />
                    </div>

                    <div class="relative">
                        <label for="password" class="text-[11px] font-bold uppercase tracking-widest text-emerald-700 ml-4 mb-1 block">Kunci Pagar</label>
                        <input id="password" 
                            class="block w-full h-14 px-6 rounded-3xl border-2 border-emerald-50 focus:border-emerald-400 focus:ring-4 focus:ring-emerald-100 transition-all bg-white/80 placeholder-emerald-200"
                            type="password" name="password"
                            required placeholder="••••••••" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 px-4" />
                    </div>

                    <div class="flex items-center justify-between px-2">
                        <label class="flex items-center cursor-pointer group">
                            <input id="remember_me" type="checkbox" class="w-5 h-5 rounded-lg border-emerald-200 text-emerald-500 focus:ring-emerald-400" name="remember">
                            <span class="ms-2 text-xs font-bold text-emerald-700">Ingat Saya</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a class="text-xs font-bold text-emerald-600 hover:text-emerald-800 underline decoration-2 underline-offset-4" href="{{ route('password.request') }}">
                                Lupa?
                            </a>
                        @endif
                    </div>

                    <button type="submit" class="w-full h-16 flex items-center justify-center bg-emerald-500 hover:bg-emerald-600 active:scale-[0.97] transition-all rounded-3xl text-white font-black text-lg shadow-lg shadow-emerald-200 mt-4">
                        MASUK KE KEBUN 🌻
                    </button>
                </form>

                <div class="mt-8 text-center">
                    <p class="text-sm font-medium text-emerald-600">
                        Belum punya lahan? <br>
                        <a href="{{ route('register') }}" class="text-emerald-900 font-black text-base hover:underline">
                            Mulai Tanam Sekarang!
                        </a>
                    </p>
                </div>
            </div>

            <div class="text-center opacity-40">
                <p class="text-[10px] font-black uppercase tracking-[0.3em] text-emerald-800 italic">Garden Finance Mobile v1.0</p>
            </div>
        </div>
    </div>

    <style>
        body { overflow: hidden; position: fixed; width: 100%; }
        .min-h-screen { background: transparent !important; }
        svg.w-20.h-20 { display: none !important; } /* Sembunyikan logo Laravel default */
    </style>
</x-guest-layout>