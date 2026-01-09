<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomSchedule;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::with('category')->withCount('reservations')->paginate(10);
        return view('admin.rooms.index', compact('rooms'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('admin.rooms.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'roomname' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'description' => 'required|string',
            'floor' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('rooms', 'public');
            $data['image'] = $imagePath;
        }

        Room::create($data);

        return redirect()->route('rooms.index')->with('success', 'Room created successfully.');
    }

    public function show(Room $room)
    {
        return view('admin.rooms.show', compact('room'));
    }

    public function edit(Room $room)
    {
        $categories = \App\Models\Category::all();
        return view('admin.rooms.edit', compact('room', 'categories'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'roomname' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'description' => 'required|string',
            'floor' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($room->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($room->image)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($room->image);
            }
            $imagePath = $request->file('image')->store('rooms', 'public');
            $data['image'] = $imagePath;
        }

        $room->update($data);

        return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
    }

    public function destroy(Room $room)
    {
        if ($room->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($room->image)) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($room->image);
        }
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
    }




    public function detail(Request $request, $id)
    {

        $room = Room::find($id);

        if (!$room) {
            abort(404);
        }


        $date = $request->query('date', now()->format('Y-m-d'));


        try {
            $parsedDate = \Carbon\Carbon::parse($date);
            $today = now()->startOfDay();

            if ($parsedDate->lt($today)) {
                return redirect()->route('rooms.detail', ['id' => $id, 'date' => $today->format('Y-m-d')]);
            }

            $date = $parsedDate->format('Y-m-d');
        } catch (\Exception $e) {
            $date = now()->format('Y-m-d');
        }

        $schedule = RoomSchedule::with('reservation.user')->where('room_id', $room->id)
            ->where('date', $date)
            ->get();


        return view('rooms.detail', compact('room', 'schedule', 'date'));
    }

    public function kelas()
    {
        $rooms = Room::whereHas('category',  function ($query) {
            $query->where('name', 'like', '%kelas%');
        })->get();

        return view('rooms.kelas', compact('rooms'));
    }

    public function laboratorium()
    {
        $rooms = Room::whereHas('category', function ($query) {
            $query->where('name', 'like', '%lab%');
        })->get();

        return view('rooms.lab', compact('rooms'));
    }

}
