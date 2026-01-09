@extends('admin.layout')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-stone-900">Reservations Management</h1>
        <div class="flex gap-2">
            <!-- Filter can be implemented later -->
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
                        <th class="px-6 py-4">ID</th>
                        <th class="px-6 py-4">User</th>
                        <th class="px-6 py-4">Room</th>
                        <th class="px-6 py-4">Date/Time</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-200">
                    @forelse($reservations as $reservation)
                        <tr class="hover:bg-stone-50">
                            <td class="px-6 py-4">#{{ $reservation->id }}</td>
                            <td class="px-6 py-4 font-medium text-stone-900">
                                {{ $reservation->user ? $reservation->user->name : 'Unknown' }}</td>
                            <td class="px-6 py-4">{{ $reservation->room ? $reservation->room->roomname : 'Unknown' }}</td>
                            <td class="px-6 py-4">
                                @if ($reservation->schedule)
                                Start: {{ \Carbon\Carbon::parse($reservation->schedule->booked_start)->format('Y-m-d H:i') }} <br>
                                End: {{ \Carbon\Carbon::parse($reservation->schedule->booked_end)->format('Y-m-d H:i') }}
                                @else
                                Not Scheduled
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2 py-1 text-xs font-semibold
                                @if ($reservation->status == 'approved') bg-green-100 text-green-700
                                @elseif($reservation->status == 'pending') bg-yellow-100 text-yellow-700
                                @elseif($reservation->status == 'rejected') bg-red-100 text-red-700
                                @elseif($reservation->status == 'completed') bg-blue-100 text-blue-700
                                @else bg-gray-100 text-gray-700 @endif
                                rounded-full">
                                    {{ ucfirst($reservation->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 flex gap-2">
                                <a href="{{ route('reservations.edit', $reservation->id) }}"
                                    class="text-stone-400 hover:text-stone-600">Details/Edit</a>
                                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-stone-500">No reservations found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-stone-200">
            {{ $reservations->links() }}
        </div>
    </div>
@endsection
