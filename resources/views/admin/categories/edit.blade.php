@extends('admin.layout')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-stone-900">Edit Category</h1>
    </div>

    <div class="bg-white rounded-lg border border-stone-200 shadow-sm max-w-2xl">
        <div class="p-6">
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-stone-700 mb-1">Name</label>
                    <input type="text" name="name" id="name" value="{{ $category->name }}" required
                        class="input input-bordered w-full">
                </div>

                <div class="flex justify-end gap-2">
                    <a href="{{ route('categories.index') }}"
                        class="btn btn-outline">Cancel</a>
                    <button type="submit" class="px-4 py-2 bg-amber-500 text-white rounded-lg hover:bg-amber-600">
                        Update Category
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
