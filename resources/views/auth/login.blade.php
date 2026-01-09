@extends('layout.auth')
@section('content')
    <div class="flex h-screen">
        <!-- Left Pane -->
        <div class="hidden lg:flex items-center justify-center flex-1 bg-white text-black relative overflow-hidden">


            <div class="text-center z-10 px-8">
                <div class="mb-8">
                    <h2 class="text-4xl font-bold text-[#F50057] mb-4">Selamat Datang!</h2>
                    <p class="text-gray-600 text-lg mb-8">Sistem Peminjaman Ruangan Terpadu</p>
                </div>
                <img src="{{ asset('loginiLus.png') }}" alt="Login Illustration" class="w-[40rem] drop-shadow-xl">

            </div>
        </div>

        <!-- Right Pane with Login Form -->
        <div
            class="w-full bg-gradient-to-br from-[#F50057] via-[#F50057] to-[#FF4081] lg:w-1/2 flex items-center justify-center py-12 relative overflow-hidden">
            <!-- Background Decorations -->
            <div class="absolute top-20 right-10 w-40 h-40 bg-white opacity-5 rounded-full"></div>
            <div class="absolute bottom-10 left-10 w-32 h-32 bg-white opacity-5 rounded-full"></div>
            <div class="absolute top-1/2 left-20 w-20 h-20 bg-white opacity-5 rounded-full"></div>

            <div class="max-w-2xl h-full w-full bg-white rounded-lg p-8 flex flex-col items-center shadow-2xl z-10">
                <!-- Header Section -->
                <div class="w-full mb-6">
                    <div class="flex items-center justify-center mb-4">
                        <img src="{{ asset('logoPeminjaman.png') }}" alt="Logo" class="w-32">
                    </div>
                    <h1 class="text-4xl font-bold mb-2 text-[#F50057] text-center">Login</h1>
                    <p class="text-sm text-gray-500 text-center">Untuk Meminjam Ruangan</p>
                    <div class="w-20 h-1 bg-[#F50057] mx-auto mt-3 rounded-full"></div>
                </div>



                <!-- Login Form -->
                <form action="#" method="POST" class="space-y-5 w-full px-10">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                            </div>
                            <input type="email" id="email" name="email" placeholder="Masukkan email"
                                class="pl-10 mt-1 p-3 w-full border text-stone-900 border-gray-300 rounded-lg focus:border-[#F50057] focus:outline-none focus:ring-2 focus:ring-[#F50057] focus:ring-opacity-20 transition-all duration-300">
                        </div>
                        @error('email')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="password" id="password" name="password" placeholder="Masukkan password"
                                class="pl-10 mt-1 p-3 w-full border text-stone-900 border-gray-300 rounded-lg focus:border-[#F50057] focus:outline-none focus:ring-2 focus:ring-[#F50057] focus:ring-opacity-20 transition-all duration-300">
                        </div>
                        @error('password')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-[#F50057] to-[#FF4081] text-white p-3 rounded-lg hover:shadow-lg  font-semibold">
                            Sign In
                        </button>
                    </div>
                </form>

                <!-- Divider -->
                <div class="flex items-center w-full px-10 my-6">
                    <div class="flex-grow border-t border-gray-300"></div>
                    <span class="px-4 text-sm text-gray-500">atau</span>
                    <div class="flex-grow border-t border-gray-300"></div>
                </div>

                <!-- Register Link -->
                <div class="text-center">
                    <p class="text-sm text-gray-600">Belum Punya Akun?</p>
                    <a href="/register"
                        class="text-[#F50057] hover:underline font-bold text-base inline-flex items-center mt-1">
                        Register here
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
