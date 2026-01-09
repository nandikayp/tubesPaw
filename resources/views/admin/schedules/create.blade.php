@extends('admin.layout')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-stone-900">Add Schedule</h1>
    </div>

    <div class="bg-white rounded-lg border border-stone-200 shadow-sm max-w-2xl">
        <div class="p-6">
            <form action="{{ route('schedules.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="room_id" class="block text-sm font-medium text-stone-700 mb-1">Room</label>
                    <select name="room_id" id="room_id" required
                        class="select select-bordered w-full">
                        <option value="">Select Room</option>
                        @foreach ($rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->roomname }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="date" class="block text-sm font-medium text-stone-700 mb-1">Date</label>
                    <input type="date" name="date" id="date" required
                        class="input input-bordered w-full">
                </div>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="booked_start" class="block text-sm font-medium text-stone-700 mb-1">Start Time</label>
                        <input type="time" name="booked_start" id="booked_start" required
                            class="input input-bordered w-full">
                    </div>
                    <div>
                        <label for="booked_end" class="block text-sm font-medium text-stone-700 mb-1">End Time</label>
                        <input type="time" name="booked_end" id="booked_end" required
                            class="input input-bordered w-full">
                    </div>
                </div>

                <div class="flex justify-end gap-2">
                    <a href="{{ route('schedules.index') }}"
                        class="btn btn-outline">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        Save Schedule
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
