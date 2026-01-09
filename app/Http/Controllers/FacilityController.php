<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Facility;
use App\Models\Room;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::with('room')->paginate(10);
        return view('admin.facilities.index', compact('facilities'));
    }

    public function create()
    {
        $rooms = Room::all();
        return view('admin.facilities.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'room_id' => 'required|exists:rooms,id',
        ]);

        Facility::create($request->all());

        return redirect()->route('facilities.index')->with('success', 'Facility created successfully.');
    }

    public function edit(Facility $facility)
    {
        $rooms = Room::all();
        return view('admin.facilities.edit', compact('facility', 'rooms'));
    }

    public function update(Request $request, Facility $facility)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'room_id' => 'required|exists:rooms,id',
        ]);

        $facility->update($request->all());

        return redirect()->route('facilities.index')->with('success', 'Facility updated successfully.');
    }

    public function destroy(Facility $facility)
    {
        $facility->delete();
        return redirect()->route('facilities.index')->with('success', 'Facility deleted successfully.');
    }
}
