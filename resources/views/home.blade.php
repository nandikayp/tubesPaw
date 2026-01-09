<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme='cupcake'>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {!! ToastMagic::styles() !!}

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-stone-50">
    <!-- Header -->
    @include('navbar')

    <main class="pt-20">
        <section class="max-w-7xl mx-auto px-4 lg:px-8 py-12 lg:py-20">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Kiri -->
                <div class="lg:pr-12">

                    <h1 class="text-5xl lg:text-6xl font-bold text-stone-900 leading-tight mb-6">
                        Pesan Ruangan<br>
                        Kampus dengan<br>
                        <span class="text-red-600">Mudah & Cepat</span>
                    </h1>
                    <p class="text-lg text-stone-600 mb-8 leading-relaxed">
                        Platform booking ruangan kampus yang efisien untuk mahasiswa, dosen, dan organisasi.

                    </p>
                    <div class="flex flex-wrap gap-4">
                        @if (!Auth::check())
                            <a href="/login"
                                class="px-8 py-3 bg-red-600 text-white font-medium rounded-full hover:bg-red-700 transition-colors shadow-lg shadow-red-600/30">
                                Mulai Booking
                            </a>
                        @endif
                        <a href="#panduan"
                            class="px-8 py-3 bg-white text-stone-900 font-medium rounded-full hover:bg-stone-50 transition-colors border-2 border-stone-200">
                            Lihat Panduan
                        </a>
                    </div>
                </div>

                <!-- Right Content - Room Cards -->
                <div class="grid grid-cols-2 gap-4">
                    <!-- Card 1 - Ruang Kelas -->
                    <div class="bg-red-100 rounded-3xl p-6 aspect-square flex flex-col justify-between">
                        <div>
                            <div
                                class="inline-block px-3 py-1 bg-white/80 backdrop-blur-sm rounded-full text-xs font-semibold text-stone-900 mb-3">
                                Ruang Kelas
                            </div>
                        </div>
                        <div>
                            <div class="bg-white/90 rounded-2xl p-4 shadow-lg">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="w-10 h-10 bg-amber-400 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-stone-900 text-sm">Ruang Kelas</div>
                                        <div class="text-xs text-stone-600">40 Orang</div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 text-xs text-stone-600">
                                    AC, WiFi, TV
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 - Laboratorium -->
                    <div class="bg-red-500 rounded-2xl p-6 aspect-square flex flex-col justify-between">
                        <div>
                            <div
                                class="inline-block px-3 py-1 bg-white/90  rounded-full text-xs font-semibold text-stone-900 mb-3">
                                Laboratorium
                            </div>
                        </div>
                        <div>
                            <div class="bg-white/90  rounded-2xl p-4 shadow-lg">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="w-10 h-10 bg-blue-400 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-stone-900 text-sm">Lab Komputer</div>
                                        <div class="text-xs text-stone-600">40 Unit PC</div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 text-xs text-stone-600">
                                    AC, WiFi, TV
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Kategori Ruangan -->
        <section class="bg-white py-16">
            <div class="max-w-7xl mx-auto px-4 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl lg:text-4xl font-bold text-stone-900 mb-4">Kategori Ruangan</h2>
                    <p class="text-lg text-stone-600">Pilih ruangan sesuai kebutuhan Anda</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-2 gap-6">
                    <!-- Ruang Kelas -->
                    <a href="/ruangan/kelas">
                        <div
                            class="group bg-stone-50 rounded-3xl p-8 hover:bg-red-50 transition-all cursor-pointer border-2 border-transparent hover:border-red-200">
                            <div
                                class="w-14 h-14 bg-red-100 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-red-200 transition-colors">
                                <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-stone-900 mb-2">Ruang Kelas</h3>
                            <p class="text-stone-600 mb-4">8 ruangan dengan kapasitas 40 orang</p>
                            <div class="flex items-center text-red-600 font-medium text-sm">
                                Lihat detail
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <!-- Laboratorium -->
                    <a href="/ruangan/laboratorium">
                        <div
                            class="group bg-stone-50 rounded-3xl p-8 hover:bg-red-50 transition-all cursor-pointer border-2 border-transparent hover:border-red-200">
                            <div
                                class="w-14 h-14 bg-red-100 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-red-200 transition-colors">
                                <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-stone-900 mb-2">Laboratorium</h3>
                            <p class="text-stone-600 mb-4">3 lab dengan fasilitas yang lengkap</p>
                            <div class="flex items-center text-red-600 font-medium text-sm">
                                Lihat detail
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>
        </section>

        <!-- Cara Booking Section -->
        <section id = 'panduan' class="py-16">
            <div class="max-w-7xl mx-auto px-4 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl lg:text-4xl font-bold text-stone-900 mb-4">Cara Booking Ruangan</h2>
                    <p class="text-lg text-stone-600">Proses booking yang mudah dan cepat</p>
                </div>

                <div class="grid md:grid-cols-4 gap-8">
                    <!-- Step 1 -->
                    <div class="text-center">
                        <div
                            class="w-16 h-16 bg-red-600 text-white rounded-2xl flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                            1
                        </div>
                        <h3 class="text-lg font-bold text-stone-900 mb-2">Login</h3>
                        <p class="text-stone-600">Masuk menggunakan akun Anda</p>
                    </div>

                    <!-- Step 2 -->
                    <div class="text-center">
                        <div
                            class="w-16 h-16 bg-red-600 text-white rounded-2xl flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                            2
                        </div>
                        <h3 class="text-lg font-bold text-stone-900 mb-2">Pilih Ruangan</h3>
                        <p class="text-stone-600">Browse dan pilih ruangan sesuai kebutuhan</p>
                    </div>

                    <!-- Step 3 -->
                    <div class="text-center">
                        <div
                            class="w-16 h-16 bg-red-600 text-white rounded-2xl flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                            3
                        </div>
                        <h3 class="text-lg font-bold text-stone-900 mb-2">Isi Form</h3>
                        <p class="text-stone-600">Lengkapi data booking dan waktu peminjaman</p>
                    </div>

                    <!-- Step 4 -->
                    <div class="text-center">
                        <div
                            class="w-16 h-16 bg-red-600 text-white rounded-2xl flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                            4
                        </div>
                        <h3 class="text-lg font-bold text-stone-900 mb-2">Konfirmasi</h3>
                        <p class="text-stone-600">Tunggu approval dan dapatkan konfirmasi</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-16">
            <div class="max-w-7xl mx-auto px-4 lg:px-8">
                <div class="bg-gradient-to-br from-red-600 to-red-700 rounded-3xl p-12 text-center text-white">
                    <h2 class="text-3xl lg:text-4xl font-bold mb-4">Siap Booking Ruangan?</h2>
                    <p class="text-lg text-red-100 mb-8 max-w-2xl mx-auto">
                        @auth
                            Ayo mulai pemesanan ruangan untuk kebutuhan Anda!
                        @else
                        Daftar sekarang dan nikmati kemudahan booking ruangan kampus kapan saja, di mana saja
                        @endauth
                    </p>
                    <div class="flex flex-wrap gap-4 justify-center">
                        @auth
                            <a href="/ruangan/kelas"
                                class="px-8 py-3 bg-white text-red-600 font-semibold rounded-full hover:bg-red-50 transition-colors shadow-lg">
                                Booking Sekarang
                            </a>
                        @else
                            <a href="/register"
                                class="px-8 py-3 bg-white text-red-600 font-semibold rounded-full hover:bg-red-50 transition-colors shadow-lg">
                                Daftar Sekarang
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </section>
    </main>

    {!! ToastMagic::scripts() !!}

</body>

</html>
