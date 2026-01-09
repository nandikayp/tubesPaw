<header class="fixed top-0 inset-x-0 z-50 bg-white/80 backdrop-blur-md border-b border-stone-200">
    <nav aria-label="Global" class="flex items-center justify-between p-4 lg:px-8 max-w-7xl mx-auto">
        <div class="flex lg:flex-1">
            <a href="/" class="-m-1.5 p-1.5 flex items-center gap-2">
                <img src="{{ asset('logoPeminjaman.png') }}" alt="Logo" class="h-12 w-auto" />
                <span class="text-xl font-bold text-stone-900">Room Booking</span>
            </a>

        </div>
        <div class="flex lg:hidden">
            <button type="button" command="show-modal" commandfor="mobile-menu"
                class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-stone-700">
                <span class="sr-only">Open main menu</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon"
                    aria-hidden="true" class="size-6">
                    <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-8">
            <a href="/"
                class="px-4 py-2 text-sm font-medium text-stone-900 hover:text-red-600 rounded-full  transition-colors">Beranda</a>
            <div class="relative group">
                <button
                    class="px-4 py-2 text-sm font-medium text-stone-700 hover:text-red-600 transition-colors flex items-center gap-1">
                    Ruangan
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <!-- Dropdown -->
                <div
                    class="absolute top-full left-0 mt-2 w-48   bg-white rounded-xl shadow-lg border border-stone-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                    <a href="/ruangan/kelas"
                        class="block px-4 py-3 text-sm text-stone-700 hover:bg-stone-50 rounded-t-xl">Ruang
                        Kelas</a>
                    <a href="/ruangan/laboratorium"
                        class="block px-4 py-3 text-sm text-stone-700 hover:bg-stone-50">Laboratorium</a>

                </div>
            </div>

        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end gap-3">
            @auth
                <div class="dropdown dropdown-hover">
                    <div tabindex="0" role="button" class="btn m-1 btn-ghost">{{ Auth::user()->name }} <svg
                            class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg></div>
                    <ul tabindex="-1" class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm">
                        <li><a href="{{ route('my-bookings') }}">My Bookings</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="text-red-500">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="/login" class="px-6 py-2 text-sm font-medium text-stone-700 hover:text-red-600 transition-colors">
                    Masuk
                </a>
                <a href="/register"
                    class="px-6 py-2 text-sm font-medium text-white bg-stone-900 rounded-full hover:bg-stone-800 transition-colors">
                    Daftar
                </a>
            @endauth
        </div>
    </nav>

</header>
