@extends('admin.layout')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-stone-900">Room Schedules</h1>
        <div class="flex gap-2">
            <a href="{{ route('schedules.create') }}" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                Add Schedule
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-50 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg border border-stone-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-stone-600">
                <thead class="bg-stone-50 text-stone-900 font-medium border-b border-stone-200">
                    <tr>
                        <th class="px-6 py-4">Date</th>
                        <th class="px-6 py-4">Room</th>
                        <th class="px-6 py-4">Time</th>
                        <th class="px-6 py-4">Reservation</th>
                        <th class="px-6 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-200">
                    @forelse($schedules as $schedule)
                        <tr class="hover:bg-stone-50">
                            <td class="px-6 py-4">{{ $schedule->date }}</td>
                            <td class="px-6 py-4 font-medium text-stone-900">
                                {{ $schedule->room ? $schedule->room->roomname : 'Unknown' }}</td>
                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($schedule->booked_start)->format('H:i') }} - {{ \Carbon\Carbon::parse($schedule->booked_end)->format('H:i')}}</td>
                            <td class="px-6 py-4">
                                @if ($schedule->reservation_id)
                                    <span class="text-green-600">Booked (#{{ $schedule->reservation_id }})</span>
                                @else
                                    <span class="text-stone-400">Available</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 flex gap-2">
                                <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-stone-500">No schedules found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-stone-200">
            {{ $schedules->links() }}
        </div>
    </div>
@endsection
