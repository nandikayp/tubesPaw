<?php

namespace App\Http\Controllers;

use App\Models\RoomSchedule;
use Illuminate\Http\Request;

class RoomScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = RoomSchedule::with('room')->latest('date')->paginate(10);
        return view('admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
        $rooms = \App\Models\Room::all();
        return view('admin.schedules.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'date' => 'required|date',
            'booked_start' => 'required',
            'booked_end' => 'required|after:booked_start',
        ]);

        RoomSchedule::create($request->all());

        return redirect()->route('schedules.index')->with('success', 'Schedule created successfully.');
    }

    public function destroy(RoomSchedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('schedules.index')->with('success', 'Schedule deleted successfully.');
    }

}
