@extends('admin.layout')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-stone-900">Users Management</h1>
        <a href="{{ route('users.create') }}" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
            Add New User
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
                        <th class="px-6 py-4">Email</th>
                        <th class="px-6 py-4">Role</th>
                        <th class="px-6 py-4">Joined Date</th>
                        <th class="px-6 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-200">
                    @forelse($users as $user)
                        <tr class="hover:bg-stone-50">
                            <td class="px-6 py-4 font-medium text-stone-900">{{ $user->name }}</td>
                            <td class="px-6 py-4">{{ $user->email }}</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2 py-1 text-xs font-semibold {{ $user->role === 'admin' ? 'bg-red-100 text-red-700' : 'bg-gray-100 text-gray-700' }} rounded-full">{{ ucfirst($user->role) }}</span>
                            </td>
                            <td class="px-6 py-4">{{ $user->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4 flex gap-2">
                                <a href="{{ route('users.edit', $user->id) }}"
                                    class="text-amber-500 hover:text-amber-700">Edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-stone-500">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-stone-200">
            {{ $users->links() }}
        </div>
    </div>
@endsection
