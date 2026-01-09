@extends('admin.layout')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-stone-900">Upload Document</h1>
    </div>

    <div class="bg-white rounded-lg border border-stone-200 shadow-sm max-w-2xl">
        <div class="p-6">
            <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="doc_type" class="block text-sm font-medium text-stone-700 mb-1">Document Type</label>
                    <input type="text" name="doc_type" id="doc_type" required placeholder="e.g., Proposal"
                        class="w-full rounded-lg border-stone-200 focus:border-red-500 focus:ring-red-500">
                </div>

                <div class="mb-4">
                    <label for="reservation_id" class="block text-sm font-medium text-stone-700 mb-1">Reservation
                        (Optional)</label>
                    <select name="reservation_id" id="reservation_id"
                        class="w-full rounded-lg border-stone-200 focus:border-red-500 focus:ring-red-500">
                        <option value="">Select Reservation</option>
                        @foreach ($reservations as $reservation)
                            <option value="{{ $reservation->id }}">#{{ $reservation->id }} - {{ $reservation->purpose }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="file_path" class="block text-sm font-medium text-stone-700 mb-1">File</label>
                    <input type="file" name="file_path" id="file_path" required
                        class="w-full rounded-lg border-stone-200 focus:border-red-500 focus:ring-red-500 text-sm">
                </div>

                <div class="flex justify-end gap-2">
                    <a href="{{ route('documents.index') }}"
                        class="px-4 py-2 text-stone-600 hover:bg-stone-50 rounded-lg">Cancel</a>
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                        Upload
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
