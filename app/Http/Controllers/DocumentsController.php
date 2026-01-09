<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    public function index()
    {
        $documents = Documents::with('reservation')->latest()->paginate(10);
        return view('admin.documents.index', compact('documents'));
    }

    public function create()
    {
        $reservations = \App\Models\Reservation::all(); // Optionally link to reservation
        return view('admin.documents.create', compact('reservations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doc_type' => 'required|string|max:255',
            'file_path' => 'required|file|mimes:pdf,doc,docx,jpg,png|max:10240', // 10MB max
            'reservation_id' => 'nullable|exists:reservations,id',
        ]);

        $data = [
            'doc_type' => $request->doc_type,
            'reservation_id' => $request->reservation_id,
        ];

        if ($request->hasFile('file_path')) {
            $path = $request->file('file_path')->store('documents', 'public');
            $data['file_path'] = $path;
        }

        Documents::create($data);

        return redirect()->route('documents.index')->with('success', 'Document uploaded successfully.');
    }

    public function destroy(Documents $document)
    {
        if (\Illuminate\Support\Facades\Storage::disk('public')->exists($document->file_path)) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($document->file_path);
        }
        $document->delete();
        return redirect()->route('documents.index')->with('success', 'Document deleted successfully.');
    }
}
