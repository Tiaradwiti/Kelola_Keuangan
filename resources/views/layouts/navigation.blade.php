<nav x-data="{ open: false }" class="bg-white/80 backdrop-blur-md border-b border-emerald-100 sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20"> <!-- Tinggi ditambah agar lebih lega -->
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2 group">
                        <div class="bg-gradient-to-br from-[#4fa35f] to-[#245437] p-2 rounded-xl group-hover:rotate-12 transition-transform">
                            <x-application-logo class="block h-7 w-auto fill-current text-white" />
                        </div>
                        <span class="font-display text-xl font-bold text-[#245437] hidden md:block">Garden of <span class="text-[#4fa35f]">Savings</span></span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-4 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
                        class="text-[#245437] font-medium hover:text-[#4fa35f] transition-colors px-4 border-b-2 active:border-[#f2b544]">
                        <span class="flex items-center gap-2">
                            <span class="text-lg">🌿</span> {{ __('Dashboard') }}
                        </span>
                    </x-nav-link>
                    
                    <!-- Contoh menu tambahan agar lebih berwarna -->
                    <a href="#" class="inline-flex items-center px-4 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-emerald-800/60 hover:text-[#4fa35f] hover:border-emerald-200 transition duration-150 ease-in-out">
                        <span class="flex items-center gap-2">
                            <span class="text-lg">🌻</span> Kebunku
                        </span>
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-4 py-2 border border-emerald-100 text-sm leading-4 font-semibold rounded-2xl text-[#245437] bg-emerald-50/50 hover:bg-emerald-100 focus:outline-none transition ease-in-out duration-150">
                                <div class="h-6 w-6 bg-[#f2b544] rounded-full me-2 flex items-center justify-center text-[10px] text-white">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4 text-[#4fa35f]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="bg-white rounded-2xl overflow-hidden border border-emerald-50">
                                <x-dropdown-link :href="route('profile.edit')" class="hover:bg-emerald-50 text-[#245437]">
                                    <span class="flex items-center gap-2">⚙️ {{ __('Profile') }}</span>
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                            class="hover:bg-red-50 text-red-600 font-medium"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                        <span class="flex items-center gap-2">🚪 {{ __('Log Out') }}</span>
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-[#4fa35f] bg-emerald-50 hover:bg-emerald-100 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-t border-emerald-50">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                class="text-[#245437] font-medium border-l-4 border-[#4fa35f] bg-emerald-50">
                🌿 {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <a href="#" class="block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-emerald-800/60 hover:text-[#4fa35f] hover:bg-emerald-50 transition duration-150 ease-in-out">
                🌻 Kebunku
            </a>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-emerald-100 bg-[#fbfdfa]">
            <div class="px-4 flex items-center gap-3">
                <div class="h-10 w-10 bg-[#f2b544] rounded-full flex items-center justify-center text-white font-bold">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div>
                    <div class="font-display font-bold text-base text-[#245437]">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-[#4fa35f]">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-emerald-800">
                    ⚙️ {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            class="text-red-600 font-bold"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                        🚪 {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>