@extends('layouts.app')

@section('content')
    <div class="bg-stone-50 pt-24 pb-12 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-stone-900 mb-8">My Bookings</h1>

            @if ($reservations->isEmpty())
                <div class="bg-white rounded-2xl p-12 text-center shadow-sm border border-stone-200">
                    <div class="w-16 h-16 bg-stone-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-stone-900 mb-2">No bookings found</h3>
                    <p class="text-stone-500 mb-6">You haven't made any room reservations yet.</p>
                    <a href="/ruangan/kelas"
                        class="inline-flex items-center px-6 py-3 border border-transparent text-sm font-medium rounded-full text-white bg-red-600 hover:bg-red-700 transition-colors">
                        Start Booking
                    </a>
                </div>
            @else
                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">

                    @foreach ($reservations as $reservation)
                        <div
                            class="bg-white rounded-2xl p-6 shadow-sm border border-stone-200 hover:shadow-md transition-shadow">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="text-lg font-bold text-stone-900">{{ $reservation->room->name }}</h3>
                                    <p class="text-sm text-stone-500">{{ $reservation->room->category->name ?? 'Room' }} •
                                        Floor {{ $reservation->room->floor ?? '-' }}</p>
                                </div>
                                <span
                                    class="px-3 py-1 text-xs font-semibold rounded-full
                                @if ($reservation->status === 'approved') bg-green-100 text-green-800
                                @elseif($reservation->status === 'pending') bg-yellow-100 text-yellow-800
                                @elseif($reservation->status === 'rejected') bg-red-100 text-red-800
                                @else bg-gray-100 text-gray-800 @endif">
                                    {{ ucfirst($reservation->status) }}
                                </span>
                            </div>

                            <div class="space-y-3 mb-6">
                                <div class="flex items-center text-stone-600">
                                    <svg class="w-5 h-5 mr-3 text-stone-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span
                                        class="text-sm font-medium">{{ \Carbon\Carbon::parse($reservation->start_time)->format('l, d M Y') }}</span>
                                </div>
                                <div class="flex items-center text-stone-600">
                                    <svg class="w-5 h-5 mr-3 text-stone-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    @if ($reservation->schedule)
                                        <span class="text-sm font-medium">
                                            {{ \Carbon\Carbon::parse($reservation->schedule->booked_start)->format('H:i') }}
                                            -
                                            {{ \Carbon\Carbon::parse($reservation->schedule->booked_end)->format('H:i') }}
                                        </span>
                                    @else
                                        <span class="text-sm font-medium">Time not scheduled
                                        </span>
                                    @endif
                                </div>
                                <div class="flex items-start text-stone-600">
                                    <svg class="w-5 h-5 mr-3 text-stone-400 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-sm">{{ $reservation->purpose }}</span>
                                </div>
                            </div>

                            @if ($reservation->status === 'pending')
                                <div class="pt-4 border-t border-stone-100">
                                    <form action="{{ route('my-bookings.cancel', $reservation->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to cancel this booking?');">
                                        @csrf
                                        <button type="submit"
                                            class="w-full py-2 px-4 border border-red-200 text-red-600 rounded-lg text-sm font-medium hover:bg-red-50 transition-colors">
                                            Cancel Booking
                                        </button>
                                    </form>
                                </div>
                            @else
                                <div class="pt-4 border-t border-stone-100">
                                    <button disabled
                                        class="w-full py-2 px-4 border border-stone-100 text-stone-400 rounded-lg text-sm font-medium cursor-not-allowed bg-stone-50">
                                        {{ ucfirst($reservation->status) }}
                                    </button>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
