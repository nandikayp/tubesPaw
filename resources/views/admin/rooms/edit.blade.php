@extends('admin.layout')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-stone-900">Edit Room</h1>
    </div>

    <div class="bg-white rounded-lg border border-stone-200 shadow-sm max-w-2xl">
        <div class="p-6">
            <form action="{{ route('rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="roomname" class="block text-sm font-medium text-stone-700 mb-1">Room Name</label>
                    <input type="text" name="roomname" id="roomname" value="{{ $room->roomname }}" required
                        class="input input-bordered w-full">
                </div>

                <div class="mb-4">
                    <label for="category_id" class="block text-sm font-medium text-stone-700 mb-1">Category</label>
                    <select name="category_id" id="category_id" required
                        class="input input-bordered w-full">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $room->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="capacity" class="block text-sm font-medium text-stone-700 mb-1">Capacity</label>
                    <input type="number" name="capacity" id="capacity" value="{{ $room->capacity }}" required
                        class="input input-bordered w-full">
                </div>
                <div class="mb-4">
                    <label for="floor" class="block text-sm font-medium text-stone-700 mb-1">Floor</label>
                    <input type="number" name="floor" id="floor" value="{{ $room->floor }}" required
                        class="input input-bordered w-full">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-stone-700 mb-1">Description</label>
                    <textarea name="description" id="description" rows="3" required
                        class="input input-bordered w-full">{{ $room->description }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-stone-700 mb-1">Image</label>
                    @if ($room->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $room->image) }}" alt="Current Image"
                                class="h-20 w-auto rounded">
                        </div>
                    @endif
                    <input type="file" name="image" id="image" accept="image/*"
                        class="input input-bordered w-full">
                    <p class="text-xs text-stone-500 mt-1">Leave empty to keep current image</p>
                </div>

                <div class="flex justify-end gap-2">
                    <a href="{{ route('rooms.index') }}"
                        class="btn btn-outline">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        Update Room
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
