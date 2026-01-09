<!DOCTYPE html>
<html lang="id" data-theme="licght">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $room['roomname'] }} - RoomBooking</title>
    {!! ToastMagic::styles() !!}

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-stone-50">
    <!-- Header -->
    @include('navbar')

    <!-- Main Content -->
    <main class="pt-24 pb-16">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">
            <!-- Breadcrumb -->
            <div class="flex items-center gap-2 text-sm text-stone-600 mb-8">
                <a href="{{ route('home') }}" class="hover:text-red-600">Beranda</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <a href="{{ route('rooms.kelas') }}" class="hover:text-red-600">Ruang Kelas</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-stone-900 font-medium">{{ $room['roomname'] }}</span>
            </div>

            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Left Column - Room Details -->
                <div class="lg:col-span-1">
                    <!-- Room Image -->
                    <div class="bg-white rounded-2xl overflow-hidden shadow-sm mb-6">
                        <img src="/storage/{{ $room['image'] }}" alt="{{ $room['name'] }}" class="w-full h-64 object-cover">
                        <div class="p-6">
                            <div class="flex items-center gap-2 text-sm text-stone-600 mb-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                <span>{{ $room['floor'] }}</span>
                            </div>
                            <h1 class="text-3xl font-bold text-stone-900 mb-3">{{ $room['roomname'] }}</h1>
                            <p class="text-stone-600 mb-6">{{ $room['description'] }}</p>

                            <!-- Capacity -->
                            <div class="flex items-center gap-3 p-4 bg-stone-50 rounded-xl mb-6">
                                <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-sm text-stone-600">Kapasitas</div>
                                    <div class="text-lg font-bold text-stone-900">{{ $room['capacity'] }} Orang</div>
                                </div>
                            </div>


                            <div class="mb-6">
                                <h3 class="text-lg font-bold text-stone-900 mb-3">Fasilitas</h3>
                                <div class="space-y-2">
                                    @foreach ($room['facilities'] as $facility)
                                        <div class="flex items-center gap-2 text-stone-700">
                                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span>{{ $facility['name'] }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Booking Button -->
                            @auth

                            @else
                              <div
                                class="bg-gradient-to-br from-red-50 to-orange-50 rounded-xl p-4 border border-red-200">
                                <p class="text-sm text-stone-700 mb-3">Login untuk booking ruangan ini</p>
                                <a href="/login"
                                    class="block w-full px-6 py-3 bg-red-600 text-white text-center font-semibold rounded-lg hover:bg-red-700 transition-colors">
                                    Login & Booking
                                </a>
                            </div>
                            @endauth
                        </div>
                    </div>
                </div>

                <!-- Right Column - Schedule -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-sm p-6">
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h2 class="text-2xl font-bold text-stone-900 mb-1">Jadwal Booking</h2>
                                <p class="text-stone-600">
                                    {{ \Carbon\Carbon::parse($date)->locale('id')->isoFormat('dddd, D MMMM Y') }}</p>
                            </div>
                            <div class="flex items-center gap-2">
                                @php
                                    $prevDate = \Carbon\Carbon::parse($date)->subDay()->format('Y-m-d');
                                    $nextDate = \Carbon\Carbon::parse($date)->addDay()->format('Y-m-d');
                                    $isToday = \Carbon\Carbon::parse($date)->isToday();
                                @endphp
                                <form action="{{ route('rooms.detail', ['id' => $room['id'], 'date' => $date]) }}" class="flex items-center gap-2">
                                    <input type="date" class="input" value="{{ $date }}" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" name="date" />
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </form>
                                <div class="w-0.5 h-8 bg-stone-300"></div>
                                <a href="{{ $isToday ? '#' : route('rooms.detail', ['id' => $room['id'], 'date' => $prevDate]) }}"
                                    class="p-2 border border-stone-300 rounded-lg transition-colors {{ $isToday ? 'opacity-50 cursor-not-allowed bg-stone-100' : 'hover:bg-stone-50' }}"
                                    {{ $isToday ? 'disabled' : '' }}>
                                    <svg class="w-5 h-5 text-stone-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 19l-7-7 7-7" />
                                    </svg>
                                </a>
                                <a href="{{ route('rooms.detail', ['id' => $room['id'], 'date' => $nextDate]) }}"
                                    class="p-2 border border-stone-300 rounded-lg hover:bg-stone-50 transition-colors">
                                    <svg class="w-5 h-5 text-stone-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Legend -->
                        <div class="flex items-center gap-6 mb-6 p-4 bg-stone-50 rounded-xl">
                            <div class="flex items-center gap-2">
                                <div class="w-4 h-4 bg-green-500 rounded"></div>
                                <span class="text-sm text-stone-700">Tersedia</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-4 h-4 bg-red-500 rounded"></div>
                                <span class="text-sm text-stone-700">Sudah Dibooking</span>
                            </div>
                        </div>

                        <!-- Time Slots -->
                        <div class="space-y-3">
                            @if ($schedule->isEmpty())
                                   <div class="bg-stone-50 rounded-xl p-6 text-center border border-stone-200">
                                    <svg class="w-16 h-16 text-stone-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <p class="text-lg font-semibold text-stone-700 mb-2">Tidak ada jadwal booking untuk tanggal ini.</p>
                                </div>
                                @else
                                @foreach ($schedule as $slot)
                                    @if (!$slot->reservation)
                                        <!-- Available Slot -->
                                        <div
                                            class="group border-2 border-green-500 rounded-xl p-4 hover:bg-green-50 transition-all cursor-pointer">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center gap-4">
                                                    <div
                                                        class="w-16 h-16 bg-green-100 rounded-xl flex items-center justify-center">
                                                        <svg class="w-8 h-8 text-green-600" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <div class="text-lg font-bold text-stone-900">{{ \Carbon\Carbon::parse($slot->booked_start)->format('H:i') }} - {{ \Carbon\Carbon::parse($slot->booked_end)->format('H:i') }}
                                                        </div>
                                                        <div
                                                            class="flex items-center gap-2 text-sm text-green-600 font-medium">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                            <span>Tersedia</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @auth
                                                <button
                                                    onclick="openBooking.showModal()"
                                                    class="px-6 py-2 bg-green-600 text-white font-semibold rounded-lg transition-colors">
                                                    Booking
                                                </button>
                                                <dialog id="openBooking" class="modal">
                                                    <div class="modal-box">
                                                        <h3 class="text-lg font-bold">Booking</h3>
                                                <form action="{{route('reservation.store')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                <input type="hidden" name="room_id" value="{{ $slot->room_id }}">
                                                <input type="hidden" name="start_time" value="{{ $slot->booked_start }}">
                                                <input type="hidden" name="end_time" value="{{ $slot->booked_end }}">
                                                <input type="hidden" name="status" value="pending">
                                                <input type="hidden" name="date" value="{{ \Carbon\Carbon::parse($date)->format('Y-m-d') }}">
                                                <fieldset class="fieldset w-full">
                                                    <legend class="fieldset-legend">Purpose</legend>
                                                    <input type="text" name="purpose" class="input w-full" placeholder="Purpose" />
                                                </fieldset>
                                                <div class="flex justify-end mt-2">
                                                <button type="submit" class="btn btn-primary">Booking</button>
                                                </div>
                                                </form>
                                                    </div>
                                                    <form method="dialog" class="modal-backdrop">
                                                        <button>close</button>
                                                    </form>
                                                    </dialog>

                                                @endauth
                                            </div>
                                        </div>
                                    @else
                                        <!-- Booked Slot -->
                                        <div class="border-2 border-red-200 bg-red-50 rounded-xl p-4 opacity-75">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center gap-4">
                                                    <div
                                                        class="w-16 h-16 bg-red-100 rounded-xl flex items-center justify-center">
                                                        <svg class="w-8 h-8 text-red-600" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <div class="text-lg font-bold text-stone-900">{{ \Carbon\Carbon::parse($slot->booked_start)->format('H:i') }} - {{ \Carbon\Carbon::parse($slot->booked_end)->format('H:i') }}
                                                        </div>
                                                        <div
                                                            class="flex items-center gap-2 text-sm text-red-600 font-medium mb-1">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                            <span>Sudah Dibooking</span>
                                                        </div>
                                                        <div class="text-sm text-stone-700">
                                                            <div class="font-semibold">{{ $slot->reservation->user->name }}</div>
                                                        </div>
                                                        <div class="text-sm text-stone-700 truncate w-100">
                                                            <div class="truncate">{{ $slot->reservation->purpose }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="px-6 py-2 bg-stone-300 text-stone-600 font-semibold rounded-lg cursor-not-allowed">
                                                    Tidak Tersedia
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



    {!! ToastMagic::scripts() !!}


</body>

</html>
