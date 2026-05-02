<x-app-layout>
    <div class="min-h-screen bg-[#fbfdfa] py-12 relative overflow-hidden">
        
        <!-- Ornamen Latar Belakang Garden Lab -->
        <div class="fixed inset-0 -z-10">
            <div class="absolute right-[-5%] top-[-5%] w-[30rem] h-[30rem] bg-[#cdeab8]/40 blur-[120px] rounded-full animate-pulse"></div>
            <div class="absolute left-[-10%] bottom-[5%] w-[25rem] h-[25rem] bg-[#f6d989]/30 blur-[100px] rounded-full"></div>
            <div class="absolute right-[20%] bottom-[-10%] w-[20rem] h-[20rem] bg-[#ffcfd2]/20 blur-[80px] rounded-full"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 space-y-10">
            
            <!-- Header Section -->
            <div class="relative">
                <div class="text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-white border border-emerald-100 rounded-full shadow-sm mb-6">
                        <span class="flex h-2 w-2 rounded-full bg-[#f2b544] animate-ping"></span>
                        <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#4fa35f]">Personal Garden Lab</span>
                    </div>
                    <h2 class="font-display text-5xl lg:text-6xl text-[#245437] leading-tight">
                        Profil <span class="italic text-[#4fa35f]">Pekebun</span> 
                        <span class="text-[#f2b544]">.</span>
                    </h2>
                    <p class="text-emerald-800/60 mt-4 text-lg max-w-2xl">Rawat akunmu agar tetap aman, seperti merawat bunga yang sedang mekar.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                
                <!-- Sisi Kiri: Forms -->
                <div class="lg:col-span-8 space-y-10">
                    
                    <!-- 1. Update Profile Info Card -->
                    <div class="group relative p-[2px] rounded-[3rem] bg-gradient-to-br from-[#cdeab8] via-transparent to-[#f6d989] transition-all hover:shadow-2xl hover:shadow-emerald-900/10">
                        <div class="bg-white p-8 sm:p-10 rounded-[2.9rem] h-full relative overflow-hidden">
                            <div class="absolute top-0 right-0 p-6 opacity-20 text-4xl group-hover:rotate-12 transition-transform">🌸</div>
                            
                            <div class="max-w-xl">
                                <div class="mb-8">
                                    <h3 class="font-display text-2xl text-[#245437]">Informasi Bibit</h3>
                                    <p class="text-sm text-emerald-600/60 mt-1">Identitas utama pengelola taman.</p>
                                </div>
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>
                    </div>

                    <!-- 2. Update Password Card dengan Toggle Alpine.js -->
                    <div x-data="{ open: false }" class="group relative p-[2px] rounded-[3rem] bg-gradient-to-br from-[#f2b544] via-transparent to-[#4fa35f] transition-all hover:shadow-2xl hover:shadow-emerald-900/10">
                        <div class="bg-white p-8 sm:p-10 rounded-[2.9rem] h-full relative overflow-hidden">
                            <!-- Dekorasi Ikon Dinamis -->
                            <div class="absolute top-0 right-0 p-6 opacity-20 text-4xl transition-transform duration-500" :class="open ? 'rotate-12 scale-110' : 'group-hover:-rotate-12'">
                                <span x-show="!open">🔐</span>
                                <span x-show="open">🔓</span>
                            </div>

                            <div class="max-w-xl">
                                <div class="mb-8">
                                    <h3 class="font-display text-2xl text-[#245437]">Pagar Keamanan</h3>
                                    <p class="text-sm text-emerald-600/60 mt-1">Kelola kata sandi untuk menjaga keamanan kebun digitalmu.</p>
                                </div>

                                <!-- Tombol Pemicu -->
                                <div x-show="!open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95">
                                    <button @click="open = true" class="group/btn inline-flex items-center gap-3 px-8 py-4 bg-[#fbfdfa] border-2 border-[#4fa35f]/20 hover:border-[#4fa35f] text-[#245437] font-bold rounded-2xl transition-all shadow-sm hover:shadow-md">
                                        <span>Ganti Password Baru</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover/btn:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </button>
                                </div>

                                <!-- Form Reset Password -->
                                <div x-show="open" 
                                     x-transition:enter="transition ease-out duration-500" 
                                     x-transition:enter-start="opacity-0 -translate-y-4"
                                     x-transition:enter-end="opacity-100 translate-y-0">
                                    
                                    @include('profile.partials.update-password-form')

                                    <button @click="open = false" class="mt-6 text-xs font-bold uppercase tracking-widest text-rose-500 hover:text-rose-700 transition-colors flex items-center gap-2">
                                        <span>× Batalkan Perubahan</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sisi Kanan: Sidebar & Stats -->
                <div class="lg:col-span-4 space-y-8">
                    
                    <!-- Kartu Status -->
                    <div class="p-10 bg-gradient-to-b from-[#245437] to-[#1a3d28] text-white rounded-[3rem] shadow-2xl shadow-emerald-900/40 relative overflow-hidden group">
                        <div class="relative z-10 space-y-6">
                            <div class="h-16 w-16 bg-white/10 backdrop-blur-xl rounded-[1.5rem] flex items-center justify-center text-3xl shadow-inner group-hover:scale-110 transition-transform">
                                ✨
                            </div>
                            <div>
                                <h3 class="font-display text-2xl mb-2">Member Elite Pekebun</h3>
                                <p class="text-emerald-100/70 text-sm leading-relaxed">Kebunmu telah tumbuh sebesar <strong>72%</strong> sejak pertama kali ditanam.</p>
                            </div>
                            <div class="pt-4 border-t border-white/10 flex items-center justify-between">
                                <span class="text-xs font-bold uppercase tracking-widest text-[#f2b544]">Level: Senior Gardener</span>
                                <span class="text-xl">🏆</span>
                            </div>
                        </div>
                        <div class="absolute -right-10 -bottom-10 text-[12rem] opacity-5 pointer-events-none group-hover:rotate-45 transition-transform duration-700">🍃</div>
                    </div>

                    <!-- Kartu Hapus Akun -->
                    <div class="p-8 bg-rose-50/50 border border-rose-100 rounded-[3rem] transition-all hover:bg-rose-50">
                        <div class="flex items-start gap-4 mb-6">
                            <div class="h-10 w-10 bg-rose-100 rounded-xl flex items-center justify-center text-rose-600">🍂</div>
                            <div>
                                <h3 class="font-display text-lg text-rose-900">Akhiri Perjalanan</h3>
                                <p class="text-xs text-rose-700/60">Menghapus akun akan memusnahkan tamanmu selamanya.</p>
                            </div>
                        </div>
                        <div class="pt-2">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <style>
        @import url('https://fonts.bunny.net/css?family=fraunces:600,700,600i|sora:400,500,600,700');

        .font-display { font-family: 'Fraunces', serif; }
        body { font-family: 'Sora', sans-serif; -webkit-font-smoothing: antialiased; }
        
        /* Styling Form Elements agar Selaras */
        input:focus {
            --tw-ring-color: #4fa35f !important;
            border-color: #4fa35f !important;
            background-color: #f0faf2 !important;
        }

        input {
            border-radius: 1.25rem !important;
            border: 1px solid #e2e8f0 !important;
            padding: 0.75rem 1.25rem !important;
            transition: all 0.2s;
            background-color: #ffffff;
        }

        label {
            color: #245437 !important;
            font-weight: 600 !important;
            font-size: 0.875rem !important;
            margin-bottom: 0.6rem !important;
            display: block;
        }

        /* Styling Global Buttons (Save, dsb) */
        button[type="submit"], 
        .inline-flex.items-center.px-4.py-2.bg-gray-800 {
            background: #245437 !important;
            border-radius: 1.25rem !important;
            font-weight: 700 !important;
            letter-spacing: 0.025em !important;
            padding: 0.8rem 1.8rem !important;
            box-shadow: 0 10px 15px -3px rgba(36, 84, 55, 0.2) !important;
            border: none !important;
            color: white !important;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button[type="submit"]:hover {
            background: #1a3d28 !important;
            transform: translateY(-2px);
            box-shadow: 0 12px 20px -3px rgba(36, 84, 55, 0.3) !important;
        }

        /* Memperbaiki jarak antar elemen di partials form */
        .max-w-xl form > div {
            margin-bottom: 1.5rem;
        }
    </style>
</x-app-layout>