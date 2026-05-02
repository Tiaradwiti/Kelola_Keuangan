<x-app-layout>
    <div x-data="{ jendelaTerbuka: false }" class="min-h-screen bg-[#F0FDF4] pb-12">
        
        <div class="max-w-7xl mx-auto pt-8 px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                <div>
                    <h2 class="font-display text-3xl text-[#245437]">Halo, {{ Auth::user()->name }}! 👋</h2>
                    <p class="text-emerald-600 mt-1 font-medium">Laporan kebun finansialmu hari ini.</p>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('transactions.create') }}" class="px-6 py-3 bg-white text-[#245437] border border-emerald-100 rounded-2xl font-bold shadow-sm hover:bg-emerald-50 transition-all flex items-center justify-center">
                          Catat Pengeluaran
                    </a>
                    <button class="flex-1 md:flex-none px-6 py-3 bg-[#245437] text-white rounded-2xl font-bold shadow-lg shadow-emerald-900/20 hover:bg-[#1a3d28] transition-all">
                        + Top Up
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                
                <div class="relative group overflow-hidden rounded-[2.5rem] h-full shadow-[0_15px_40px_rgba(36,84,55,0.05)]">
                    <div class="bg-white p-8 border border-white h-full relative">
                        <button @click="jendelaTerbuka = false" x-show="jendelaTerbuka" x-cloak class="absolute top-4 right-4 text-emerald-300 hover:text-emerald-600 transition-colors z-30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>

                        <div class="flex items-center gap-3 mb-4">
                            <span class="p-2 bg-emerald-100 rounded-lg text-emerald-600 text-xl">💰</span>
                            <p class="text-xs font-bold text-emerald-600 uppercase tracking-widest">Total Saldo</p>
                        </div>
                        <p class="font-display text-4xl text-[#245437]">Rp 12.500.000</p>
                        <p class="text-xs text-emerald-500 mt-2 font-medium">↑ 12% dari bulan lalu</p>
                    </div>

                    <div x-show="!jendelaTerbuka" 
                         x-transition:enter="transition ease-out duration-500 transform"
                         x-transition:enter-start="-translate-y-full"
                         x-transition:enter-end="translate-y-0"
                         x-transition:leave="transition ease-in duration-500 transform"
                         x-transition:leave-start="translate-y-0"
                         x-transition:leave-end="-translate-y-full"
                         @click="jendelaTerbuka = true"
                         class="absolute inset-0 z-20 bg-gradient-to-br from-[#245437] to-[#4fa35f] flex flex-col items-center justify-center cursor-pointer">
                        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/leaf.png')]"></div>
                        <span class="text-4xl mb-2 animate-garden-breeze">🌿</span>
                        <p class="text-white font-bold text-xs tracking-[0.2em] uppercase">Buka Jendela</p>
                    </div>
                </div>

                <div class="relative group overflow-hidden rounded-[2.5rem] h-full shadow-[0_15px_40px_rgba(36,84,55,0.05)]">
                    <div class="bg-white p-8 border border-white h-full relative">
                        <button @click="jendelaTerbuka = false" x-show="jendelaTerbuka" x-cloak class="absolute top-4 right-4 text-orange-300 hover:text-orange-600 transition-colors z-30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>

                        <div class="flex items-center gap-3 mb-4">
                            <span class="p-2 bg-orange-100 rounded-lg text-orange-600 text-xl">📉</span>
                            <p class="text-xs font-bold text-orange-600 uppercase tracking-widest">Total Pengeluaran</p>
                        </div>
                        <p class="font-display text-4xl text-[#245437]">Rp 3.240.000</p>
                        <p class="text-xs text-orange-400 mt-2 font-medium">4 Kategori pengeluaran</p>
                    </div>

                    <div x-show="!jendelaTerbuka" 
                         x-transition:enter="transition ease-out duration-500 delay-100 transform"
                         x-transition:enter-start="-translate-y-full"
                         x-transition:enter-end="translate-y-0"
                         x-transition:leave="transition ease-in duration-500 delay-100 transform"
                         x-transition:leave-start="translate-y-0"
                         x-transition:leave-end="-translate-y-full"
                         @click="jendelaTerbuka = true"
                         class="absolute inset-0 z-20 bg-gradient-to-br from-[#245437] to-[#4fa35f] flex flex-col items-center justify-center cursor-pointer">
                        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/leaf.png')]"></div>
                        <span class="text-4xl mb-2">🌳</span>
                        <p class="text-white font-bold text-xs tracking-[0.2em] uppercase">Lihat Detail</p>
                    </div>
                </div>

                <div class="bg-[#245437] p-8 rounded-[2.5rem] shadow-xl text-white relative overflow-hidden flex flex-col justify-center border-4 border-emerald-400/20">
                    <div class="flex justify-between items-start relative z-10">
                        <p class="text-xs font-bold text-emerald-300 uppercase tracking-widest opacity-80">Sisa Anggaran</p>
                        <button @click="jendelaTerbuka = !jendelaTerbuka" class="bg-white/10 hover:bg-white/20 p-2 rounded-xl transition-all">
                             <span x-text="jendelaTerbuka ? 'Tutup Tirai 🔒' : 'Privasi Aman ✅'" class="text-[10px] font-bold"></span>
                        </button>
                    </div>
                    <p class="font-display text-4xl mt-2 relative z-10">Rp 1.760.000</p>
                    <div class="mt-4 w-full h-1.5 bg-white/20 rounded-full overflow-hidden relative z-10">
                        <div class="h-full bg-emerald-400 rounded-full transition-all duration-1000" style="width: 65%"></div>
                    </div>
                    <div class="absolute -right-4 -bottom-4 text-6xl opacity-10 rotate-12">🍃</div>
                </div>
            </div>

            </div>
    </div>

    <style>
        .font-display { font-family: 'Fraunces', serif; }
        body { font-family: 'Sora', sans-serif; }
        [x-cloak] { display: none !important; }
        
        @keyframes breeze {
            0%, 100% { transform: rotate(-3deg) translateY(0); }
            50% { transform: rotate(3deg) translateY(-5px); }
        }
        .animate-garden-breeze {
            display: inline-block;
            animation: breeze 4s ease-in-out infinite;
            transform-origin: bottom center;
        }
    </style>
</x-app-layout>