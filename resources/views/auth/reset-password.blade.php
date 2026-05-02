<x-guest-layout>
    <div class="min-h-screen bg-[#fbfdfa] flex flex-col justify-center items-center relative overflow-hidden py-12 px-6">
        
        <!-- Ornamen Latar Belakang (Warna-warni sesuai tema) -->
        <div class="fixed inset-0 -z-10">
            <div class="absolute right-[-5%] top-[-5%] w-[30rem] h-[30rem] bg-[#cdeab8]/40 blur-[120px] rounded-full animate-pulse"></div>
            <div class="absolute left-[-10%] bottom-[5%] w-[25rem] h-[25rem] bg-[#f6d989]/30 blur-[100px] rounded-full"></div>
            <div class="absolute right-[15%] bottom-[-5%] w-[20rem] h-[20rem] bg-[#ffcfd2]/30 blur-[80px] rounded-full"></div>
        </div>

        <!-- Logo & Header -->
        <div class="mb-10 text-center relative">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-[#4fa35f] to-[#245437] rounded-[2rem] shadow-xl shadow-emerald-900/20 mb-6 rotate-3">
                <span class="text-4xl">🔐</span>
            </div>
            <h2 class="font-display text-4xl text-[#245437]">Pulihkan <span class="italic text-[#4fa35f]">Akses</span></h2>
            <p class="text-emerald-800/60 mt-3 max-w-xs mx-auto">Jangan khawatir, kami akan bantu kamu kembali merawat tamanmu.</p>
        </div>

        <!-- Reset Password Card -->
        <div class="w-full max-w-md">
            <div class="group relative p-[2px] rounded-[3rem] bg-gradient-to-br from-[#f2b544] via-[#4fa35f] to-[#cdeab8] shadow-2xl shadow-emerald-900/10">
                <div class="bg-white p-10 rounded-[2.9rem] relative overflow-hidden">
                    
                    <!-- Dekorasi Bunga Kecil -->
                    <div class="absolute -top-4 -right-4 opacity-10 text-6xl pointer-events-none group-hover:rotate-12 transition-transform">🌻</div>

                    <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block font-display text-[#245437] mb-2">Email Pekebun</label>
                            <input id="email" class="block w-full bg-emerald-50/30 border-emerald-100 focus:border-[#4fa35f] focus:ring-[#4fa35f] rounded-2xl" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <label for="password" class="block font-display text-[#245437] mb-2">Password Baru</label>
                            <input id="password" class="block w-full bg-emerald-50/30 border-emerald-100 focus:border-[#4fa35f] focus:ring-[#4fa35f] rounded-2xl" type="password" name="password" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <label for="password_confirmation" class="block font-display text-[#245437] mb-2">Konfirmasi Password</label>
                            <input id="password_confirmation" class="block w-full bg-emerald-50/30 border-emerald-100 focus:border-[#4fa35f] focus:ring-[#4fa35f] rounded-2xl" type="password" name="password_confirmation" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-8">
                            <button type="submit" class="w-full py-4 bg-[#245437] hover:bg-[#1a3d28] text-white font-bold rounded-2xl shadow-lg shadow-emerald-900/20 transition-all transform hover:-translate-y-1 active:scale-95">
                                Perbarui Password & Masuk 🌿
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Back Link -->
            <div class="text-center mt-8">
                <a href="{{ route('login') }}" class="text-sm font-medium text-[#4fa35f] hover:text-[#245437] transition-colors">
                    ← Kembali ke halaman masuk
                </a>
            </div>
        </div>
    </div>

    <style>
        @import url('https://fonts.bunny.net/css?family=fraunces:600,700,600i|sora:400,500,600,700');
        
        .font-display { font-family: 'Fraunces', serif; }
        body { font-family: 'Sora', sans-serif; }

        input:focus {
            --tw-ring-color: #4fa35f !important;
            border-color: #4fa35f !important;
        }
    </style>
</x-guest-layout>