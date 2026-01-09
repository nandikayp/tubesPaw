<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="bg-stone-50 font-sans antialiased">
    <div class="min-h-screen flex" x-data="{ sidebarOpen: false }">

        <!-- Mobile Sidebar Overlay
        <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 z-20 bg-black/50 lg:hidden"
            style="display: none;"></div> -->

        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 z-30 w-64 bg-white border-r border-stone-200 transition-transform duration-300 lg:translate-x-0 lg:static lg:inset-auto">

            <div class="h-full flex flex-col">
                <!-- Logo -->
                <div class="h-16 flex items-center px-6 border-b border-stone-100">
                    <a href="{{ route('home') }}" class="text-xl font-bold text-stone-900 flex items-center gap-2">
                        <span>Admin Dashboard</span>
                    </a>
                </div>

                <!-- Nav Links -->
                <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">

                    <!-- <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center px-3 py-2.5 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-red-50 text-red-600 font-medium' : 'text-stone-600 hover:bg-stone-50 hover:text-stone-900' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                        Dashboard
                    </a> -->

                    <div class="px-3 pt-4 pb-2 text-xs font-semibold text-stone-400 uppercase tracking-wider">
                        Master Data
                    </div>

                    <a href="{{ route('users.index') }}"
                        class="flex items-center px-3 py-2.5 rounded-lg {{ request()->routeIs('users.*') ? 'bg-red-50 text-red-600 font-medium' : 'text-stone-600 hover:bg-stone-50 hover:text-stone-900' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        Users
                    </a>

                    <a href="{{ route('rooms.index') }}"
                        class="flex items-center px-3 py-2.5 rounded-lg {{ request()->routeIs('rooms.*') ? 'bg-red-50 text-red-600 font-medium' : 'text-stone-600 hover:bg-stone-50 hover:text-stone-900' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        Rooms
                    </a>

                    <a href="{{ route('facilities.index') }}"
                        class="flex items-center px-3 py-2.5 rounded-lg {{ request()->routeIs('facilities.*') ? 'bg-red-50 text-red-600 font-medium' : 'text-stone-600 hover:bg-stone-50 hover:text-stone-900' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        Facilities
                    </a>

                    <a href="{{ route('categories.index') }}"
                        class="flex items-center px-3 py-2.5 rounded-lg {{ request()->routeIs('categories.*') ? 'bg-red-50 text-red-600 font-medium' : 'text-stone-600 hover:bg-stone-50 hover:text-stone-900' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                        Categories
                    </a>

                    <div class="px-3 pt-4 pb-2 text-xs font-semibold text-stone-400 uppercase tracking-wider">
                        Management
                    </div>

                    <a href="{{ route('reservations.index') }}"
                        class="flex items-center px-3 py-2.5 rounded-lg {{ request()->routeIs('reservations.*') ? 'bg-red-50 text-red-600 font-medium' : 'text-stone-600 hover:bg-stone-50 hover:text-stone-900' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Reservations
                    </a>
                    <a href="{{ route('schedules.index') }}"
                        class="flex items-center px-3 py-2.5 rounded-lg {{ request()->routeIs('schedules.*') ? 'bg-red-50 text-red-600 font-medium' : 'text-stone-600 hover:bg-stone-50 hover:text-stone-900' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Room Schedules
                    </a>

                    <!-- <a href="{{ route('documents.index') }}"
                        class="flex items-center px-3 py-2.5 rounded-lg {{ request()->routeIs('documents.*') ? 'bg-red-50 text-red-600 font-medium' : 'text-stone-600 hover:bg-stone-50 hover:text-stone-900' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Documents
                    </a> -->

                </nav>

                <!-- User Profile / Logout -->
                <div class="p-4 border-t border-stone-100">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-full bg-stone-100 flex items-center justify-center text-stone-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-stone-900 truncate">
                                {{ Auth::user()->name }}
                            </p>
                            <p class="text-xs text-stone-500 truncate">
                                {{ Auth::user()->email }}
                            </p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="mt-3">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center justify-center px-4 py-2 text-sm text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>

            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col min-w-0 overflow-hidden">
            <!-- Mobile Header -->
            <div class="lg:hidden flex items-center justify-between bg-white border-b border-stone-200 px-4 py-3">
                <div class="flex items-center gap-3">
                    <button @click="sidebarOpen = true" class="text-stone-500 hover:text-stone-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <span class="font-bold text-stone-900">Admin Panel</span>
                </div>
            </div>

            <div class="flex-1 overflow-auto p-4 lg:p-8">
                @yield('content')
            </div>
        </main>

    </div>
</body>

</html>
