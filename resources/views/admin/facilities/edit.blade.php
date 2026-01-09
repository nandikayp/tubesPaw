@extends('admin.layout')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-stone-900">Edit Facility</h1>
    </div>

    <div class="bg-white rounded-lg border border-stone-200 shadow-sm max-w-2xl">
        <div class="p-6">
            <form action="{{ route('facilities.update', $facility->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-stone-700 mb-1">Facility Name</label>
                    <input type="text" name="name" id="name" value="{{ $facility->name }}" required
                        class="input input-bordered w-full">
                </div>

                <div class="mb-4">
                    <label for="room_id" class="block text-sm font-medium text-stone-700 mb-1">Room</label>
                    <select name="room_id" id="room_id" required
                        class="select select-bordered w-full">
                        <option value="">Select Room</option>
                        @foreach ($rooms as $room)
                            <option value="{{ $room->id }}" {{ $facility->room_id == $room->id ? 'selected' : '' }}>
                                {{ $room->roomname }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end gap-2">
                    <a href="{{ route('facilities.index') }}"
                        class="btn btn-outline">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        Update Facility
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
