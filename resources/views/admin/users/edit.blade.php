@extends('admin.layout')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-stone-900">Edit User</h1>
    </div>

    <div class="bg-white rounded-lg border border-stone-200 shadow-sm max-w-2xl">
        <div class="p-6">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-stone-700 mb-1">Name</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}" required
                        class="input input-bordered w-full">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-stone-700 mb-1">Email</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}" required
                        class="input input-bordered w-full">
                </div>

                <div class="mb-4">
                    <label for="role" class="block text-sm font-medium text-stone-700 mb-1">Role</label>
                    <select name="role" id="role" required
                        class="input input-bordered w-full">
                        <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-stone-700 mb-1">Password</label>
                    <input type="password" name="password" id="password" minlength="8"
                        class="input input-bordered w-full">
                    <p class="text-xs text-stone-500 mt-1">Leave empty to keep current password</p>
                </div>

                <div class="flex justify-end gap-2">
                    <a href="{{ route('users.index') }}"
                        class="btn btn-outline">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        Update User
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
