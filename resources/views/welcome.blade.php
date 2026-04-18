<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kelola Keuangan | Garden of Savings</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=fraunces:600,700|sora:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            :root {
                --garden-leaf: #245437;
                --garden-leaf-soft: #4fa35f;
                --garden-bg: #fbfdfa;
            }
            .font-display { font-family: 'Fraunces', serif; }
            body { font-family: 'Sora', sans-serif; background-color: var(--garden-bg); color: var(--garden-leaf); }
            
            /* Animasi Bunga agar terasa hidup */
            @keyframes bloom {
                0% { transform: scale(0) rotate(0deg); }
                100% { transform: scale(var(--flower-scale, 1)) rotate(10deg); }
            }
            .flower-anim { animation: bloom 1s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards; }
        </style>
    </head>
    <body class="antialiased overflow-x-hidden">
        
        <div class="fixed inset-0 -z-10 overflow-hidden">
            <div class="absolute inset-x-0 top-0 h-[40rem] bg-[radial-gradient(circle_at_top,rgba(205,234,184,0.4),transparent_70%)]"></div>
            <div class="absolute left-[-5%] top-[10%] w-64 h-64 bg-[#f6d989]/20 blur-[100px] rounded-full"></div>
            <div class="absolute right-[-5%] top-[20%] w-80 h-80 bg-[#cdeab8]/40 blur-[100px] rounded-full"></div>
        </div>

        <x-navbar />

        <main class="max-w-7xl mx-auto px-6 pt-10 pb-20">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-8 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-emerald-100 rounded-full shadow-sm">
                        <span class="flex h-2 w-2 rounded-full bg-[#f2b544] animate-pulse"></span>
                        <span class="text-[10px] sm:text-xs font-bold uppercase tracking-widest text-[#4fa35f]">Taman Tabungan Masa Depan</span>
                    </div>

                    <h1 class="font-display text-5xl sm:text-6xl lg:text-7xl leading-[1.1] text-[#245437]">
                        Tabungan yang <span class="italic text-[#4fa35f]">tumbuh</span> seindah taman.
                    </h1>

                    <p class="text-lg text-emerald-800/70 max-w-xl mx-auto lg:mx-0 leading-relaxed">
                        Ubah angka membosankan jadi kebun bunga yang mekar. Semakin rajin kamu menabung, semakin subur taman finansialmu.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="{{ route('register') }}" class="px-8 py-4 bg-[#245437] text-white rounded-[1.5rem] font-bold text-lg shadow-xl shadow-emerald-900/20 hover:bg-[#1a3d28] transition-all">Buat Kebun Gratis 🌻</a>
                        <a href="#cara-kerja" class="px-8 py-4 bg-white text-[#245437] border border-emerald-100 rounded-[1.5rem] font-bold text-lg hover:bg-emerald-50 transition-all">Bagaimana Caranya?</a>
                    </div>

                    <div class="grid grid-cols-3 gap-4 pt-8 border-t border-emerald-100">
                        <div>
                            <p class="font-display text-3xl text-[#245437]">10k+</p>
                            <p class="text-xs font-medium text-emerald-600/60 uppercase">Bibit Ditanam</p>
                        </div>
                        <div>
                            <p class="font-display text-3xl text-[#245437]">85%</p>
                            <p class="text-xs font-medium text-emerald-600/60 uppercase">Hemat Bulanan</p>
                        </div>
                        <div>
                            <p class="font-display text-3xl text-[#245437]">24/7</p>
                            <p class="text-xs font-medium text-emerald-600/60 uppercase">Taman Mekar</p>
                        </div>
                    </div>
                </div>

                <div class="relative group">
                    <div class="aspect-[4/5] sm:aspect-square bg-gradient-to-b from-emerald-100 to-[#eef7e9] rounded-[3rem] overflow-hidden border-8 border-white shadow-2xl relative">
                        
                        <div class="absolute top-6 left-6 right-6 bg-white/90 backdrop-blur rounded-2xl p-4 shadow-xl z-20">
                            <p class="text-[10px] font-bold text-emerald-600 uppercase tracking-widest">Progress Tabungan</p>
                            <div class="flex justify-between items-end mt-1">
                                <h3 class="font-display text-2xl">Rp 12.500.000</h3>
                                <span class="text-xs font-bold text-emerald-500">72% Mekar</span>
                            </div>
                            <div class="w-full h-2 bg-emerald-50 rounded-full mt-3 overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-[#f2b544] to-[#4fa35f]" style="width: 72%"></div>
                            </div>
                        </div>

                        <div class="absolute inset-0 z-10">
                            <div class="absolute bottom-0 w-full h-1/2 bg-[#4fa35f] rounded-[100%_100%_0_0] translate-y-1/4"></div>
                            <div class="absolute bottom-0 w-full h-1/3 bg-[#245437] rounded-[100%_100%_0_0] translate-y-1/3 scale-110"></div>
                            
                            <div class="absolute bottom-20 left-10 text-4xl flower-anim" style="--flower-scale: 1.2">🌹</div>
                            <div class="absolute bottom-24 left-1/3 text-3xl flower-anim" style="animation-delay: 0.2s">🌻</div>
                            <div class="absolute bottom-20 right-10 text-4xl flower-anim" style="--flower-scale: 1.1; animation-delay: 0.4s">🌷</div>
                        </div>

                        <div class="absolute top-[30%] left-10 w-20 h-8 bg-white/60 rounded-full blur-sm animate-pulse"></div>
                        <div class="absolute top-[35%] right-10 w-24 h-10 bg-white/60 rounded-full blur-sm animate-pulse" style="animation-delay: 1s"></div>
                    </div>
                    
                    <div class="absolute -bottom-6 -right-6 bg-white p-6 rounded-[2rem] shadow-2xl border border-emerald-50 hidden sm:block">
                        <div class="flex items-center gap-4">
                            <div class="h-12 w-12 bg-emerald-100 rounded-2xl flex items-center justify-center text-2xl text-emerald-600">
                                📈
                            </div>
                            <div>
                                <p class="text-xs font-bold text-emerald-600 uppercase">Bulan Ini</p>
                                <p class="font-display text-xl">+Rp 850.000</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <section class="max-w-7xl mx-auto px-6 py-10 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="p-8 bg-white rounded-[2.5rem] border border-emerald-50 shadow-sm hover:shadow-xl hover:shadow-emerald-900/5 transition-all group">
                <div class="h-12 w-12 bg-orange-100 rounded-2xl flex items-center justify-center text-xl mb-6 group-hover:scale-110 transition-transform">✨</div>
                <h3 class="font-display text-2xl mb-4">Emosional</h3>
                <p class="text-sm leading-relaxed text-emerald-800/60">Tabungan bukan cuma angka, tapi perasaan bangga melihat taman yang terus bertumbuh.</p>
            </div>
            <div class="p-8 bg-[#245437] rounded-[2.5rem] text-white shadow-xl shadow-emerald-900/20">
                <div class="h-12 w-12 bg-white/20 rounded-2xl flex items-center justify-center text-xl mb-6">🎯</div>
                <h3 class="font-display text-2xl mb-4">Konsisten</h3>
                <p class="text-sm leading-relaxed text-white/70">Dapatkan reward bunga baru setiap kali kamu disiplin mencatat pengeluaran.</p>
            </div>
            <div class="p-8 bg-white rounded-[2.5rem] border border-emerald-50 shadow-sm sm:col-span-2 lg:col-span-1">
                <div class="h-12 w-12 bg-blue-100 rounded-2xl flex items-center justify-center text-xl mb-6">📊</div>
                <h3 class="font-display text-2xl mb-4">Terukur</h3>
                <p class="text-sm leading-relaxed text-emerald-800/60">Analisis pengeluaran yang tajam tapi dibalut dengan visual yang menenangkan mata.</p>
            </div>
        </section>

    </body>
</html>