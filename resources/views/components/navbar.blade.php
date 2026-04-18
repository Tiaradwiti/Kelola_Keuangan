<nav class="sticky top-0 z-50 px-6 py-4">
    <div class="max-w-7xl mx-auto flex items-center justify-between bg-white/60 backdrop-blur-xl border border-white/40 rounded-[2rem] px-5 py-3 shadow-sm">
        <div class="flex items-center gap-3">
            <a href="/" class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-gradient-to-br from-[#245437] to-[#4fa35f] text-white shadow-lg shadow-emerald-900/10">
                    &#10047;
                </div>
                <div class="hidden sm:block">
                    <p class="font-display text-lg font-bold leading-none text-[#245437]">Kelola Keuangan</p>
                    <p class="text-[9px] uppercase tracking-[0.2em] font-semibold text-[#4fa35f]">Garden of Savings</p>
                </div>
            </a>
        </div>

        <div class="flex items-center gap-2 sm:gap-4">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm font-bold px-5 py-2.5 bg-[#245437] text-white rounded-2xl hover:bg-[#1a3d28] transition-all">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-sm font-bold text-[#245437] px-4 py-2 hover:bg-emerald-50 rounded-xl transition-all">Masuk</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-sm font-bold px-5 py-2.5 bg-[#245437] text-white rounded-2xl shadow-lg shadow-emerald-900/20 hover:scale-105 transition-all">Mulai</a>
                @endif
            @endauth
        </div>
    </div>
</nav>