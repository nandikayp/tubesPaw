@extends('admin.layout')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-stone-900">Categories Management</h1>
        <a href="{{ route('categories.create') }}" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
            Add New Category
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
                        <th class="px-6 py-4">Name</th>
                        <!-- <th class="px-6 py-4">Created At</th> -->
                        <th class="px-6 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-200">
                    @forelse($categories as $category)
                        <tr class="hover:bg-stone-50">
                            <td class="px-6 py-4 font-medium text-stone-900">{{ $category->name }}</td>
                            <!-- <td class="px-6 py-4">{{ $category->created_at->format('d M Y') }}</td> -->
                            <td class="px-6 py-4 flex gap-2">
                                <a href="{{ route('categories.edit', $category->id) }}"
                                    class="text-amber-500 hover:text-amber-700">Edit</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-stone-500">No categories found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-stone-200">
            {{ $categories->links() }}
        </div>
    </div>
@endsection
