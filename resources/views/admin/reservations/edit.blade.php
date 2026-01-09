@extends('admin.layout')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-stone-900">Reservation Details</h1>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg border border-stone-200 shadow-sm p-6">
            <h2 class="text-lg font-bold text-stone-900 mb-4">Information</h2>
            <div class="space-y-3">
                <div>
                    <span class="block text-sm text-stone-500">User</span>
                    <span class="block text-stone-900 font-medium">{{ $reservation->user->name ?? 'Unknown' }}</span>
                </div>
                <div>
                    <span class="block text-sm text-stone-500">Room</span>
                    <span class="block text-stone-900 font-medium">{{ $reservation->room->roomname ?? 'Unknown' }}</span>
                </div>
                <div>
                    <span class="block text-sm text-stone-500">Start Time</span>
                    <span
                        class="block text-stone-900">{{ \Carbon\Carbon::parse($reservation->start_time)->format('Y-m-d H:i') }}</span>
                </div>
                <div>
                    <span class="block text-sm text-stone-500">End Time</span>
                    <span
                        class="block text-stone-900">{{ \Carbon\Carbon::parse($reservation->end_time)->format('Y-m-d H:i') }}</span>
                </div>
                <div>
                    <span class="block text-sm text-stone-500">Purpose</span>
                    <span class="block text-stone-900">{{ $reservation->purpose }}</span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg border border-stone-200 shadow-sm p-6 h-fit">
            <h2 class="text-lg font-bold text-stone-900 mb-4">Update Status</h2>
            <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-stone-700 mb-1">Status</label>
                    <select name="status" id="status" required
                        class="select select-bordered w-full">
                        <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ $reservation->status == 'approved' ? 'selected' : '' }}>Approved
                        </option>
                        <option value="rejected" {{ $reservation->status == 'rejected' ? 'selected' : '' }}>Rejected
                        </option>
                        <option value="completed" {{ $reservation->status == 'completed' ? 'selected' : '' }}>Completed
                        </option>
                    </select>
                </div>

                <div class="flex justify-end gap-2">
                    <a href="{{ route('reservations.index') }}"
                        class="px-4 py-2 text-stone-600 hover:bg-stone-50 rounded-lg">Back</a>
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                        Update Status
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
