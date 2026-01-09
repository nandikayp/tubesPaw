{{-- resources/views/rooms/kelas.blade.php --}}
<!DOCTYPE html>
<html lang="id"  data-theme="cupcake">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ruang Kelas - RoomBooking</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-stone-50">
    <!-- Header -->
    @include('navbar')
    <main class="pt-24 pb-16">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">
            <div class="mb-12">
                <h1 class="text-4xl lg:text-5xl font-bold text-stone-900 mb-4">Ruang Kelas</h1>
                <p class="text-lg text-stone-600">Tersedia {{ count($rooms) }} ruang kelas dengan berbagai kapasitas dan
                    fasilitas</p>
            </div>
            @if (count($rooms) == 0)
                <div class="flex flex-col items-center justify-center py-16 px-4 bg-white rounded-2xl shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20 text-stone-400 mb-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 16.318A4.486 4.486 0 0012.016 15a4.486 4.486 0 00-3.198 1.318M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                    </svg>
                    <h2 class="text-3xl font-bold text-stone-800 mb-3">Tidak Ada Ruangan Kelas</h2>
                    <p class="text-lg text-stone-600 text-center max-w-md">Mohon maaf, saat ini tidak ada ruangan kelas yang tersedia untuk ditampilkan. Silakan cek kembali nanti.</p>
                </div>
            @else
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($rooms as $room)
                    <a href= "{{ route('rooms.detail', ['id' => $room['id']]) }}"
                        class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300">
                        <!-- Foto -->
                        <div class="relative h-48 overflow-hidden">
                            <img src="/storage/{{ $room['image'] }}" alt="{{ $room['name'] }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        </div>

                        <!-- desc ruangan -->
                        <div class="p-6">
                            <h3
                                class="text-xl font-bold text-stone-900 mb-2 group-hover:text-red-600 transition-colors">
                                {{ $room['roomname'] }}</h3>
                            <p class="text-sm text-stone-600 mb-4">{{ $room['description'] }}</p>

                            <!-- Kapasitas dan lantai -->
                            <div class="flex items-center gap-4 mb-4">
                                <div class="flex items-center gap-2 text-sm text-stone-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <span>{{ $room['capacity'] }} Orang</span>
                                </div>
                                <div class="flex items-center gap-2 text-sm text-stone-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                    <span>{{ $room['floor'] }}</span>
                                </div>
                            </div>

                            <!-- Fasilitas -->
                         
                            <!-- Button -->
                            <div class="flex items-center justify-between pt-4 border-t border-stone-100">
                                <span class="text-sm font-medium text-stone-700">Lihat Jadwal</span>
                                <svg class="w-5 h-5 text-red-600 group-hover:translate-x-1 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            @endif
        </div>
    </main>
</body>
</html>
