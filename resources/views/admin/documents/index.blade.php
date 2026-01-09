@extends('admin.layout')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-stone-900">Documents Management</h1>
        <div class="flex gap-2">
            <a href="{{ route('documents.create') }}" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                Upload Document
            </a>
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
                        <th class="px-6 py-4">Type</th>
                        <th class="px-6 py-4">Reservation</th>
                        <th class="px-6 py-4">File Name</th>
                        <th class="px-6 py-4">Uploaded At</th>
                        <th class="px-6 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-200">
                    @forelse($documents as $document)
                        <tr class="hover:bg-stone-50">
                            <td class="px-6 py-4 font-medium text-stone-900">{{ $document->doc_type }}</td>
                            <td class="px-6 py-4">
                                @if ($document->reservation)
                                    <a href="{{ route('reservations.edit', $document->reservation_id) }}"
                                        class="text-blue-500 hover:underline">#{{ $document->reservation_id }}</a>
                                @else
                                    <span class="text-stone-400">N/A</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 max-w-xs truncate">{{ basename($document->file_path) }}</td>
                            <td class="px-6 py-4">{{ $document->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4 flex gap-2">
                                <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank"
                                    class="text-blue-500 hover:text-blue-700">Download</a>
                                <form action="{{ route('documents.destroy', $document->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-stone-500">No documents found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-stone-200">
            {{ $documents->links() }}
        </div>
    </div>
@endsection
