@extends('admin.layout')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-stone-900">Rooms Management</h1>
        <a href="{{ route('rooms.create') }}" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
            Add New Room
        </a>
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
                        <th class="px-6 py-4">Image</th>
                        <th class="px-6 py-4">Room Name</th>
                        <th class="px-6 py-4">Category</th>
                        <th class="px-6 py-4">Floor</th>
                        <th class="px-6 py-4">Capacity</th>
                        <th class="px-6 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-200">
                    @forelse($rooms as $room)
                        <tr class="hover:bg-stone-50">
                            <td class="px-6 py-4">
                                @if ($room->image)
                                    <img src="{{ asset('storage/' . $room->image) }}" alt="{{ $room->roomname }}"
                                        class="w-16 h-10 object-cover rounded">
                                @else
                                    <span class="text-gray-400">No Image</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-medium text-stone-900">{{ $room->roomname }}</td>
                            <td class="px-6 py-4">{{ $room->category ? $room->category->name : 'Uncategorized' }}</td>
                            <td class="px-6 py-4">{{ $room->floor }}</td>
                            <td class="px-6 py-4">{{ $room->capacity }}</td>
                            <td class="px-6 py-4 flex gap-2">
                                <a href="{{ route('rooms.edit', $room->id) }}"
                                    class="text-amber-500 hover:text-amber-700">Edit</a>
                                <form action="{{ route('rooms.destroy', $room->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-stone-500">No rooms found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-stone-200">
            {{ $rooms->links() }}
        </div>
    </div>
@endsection
