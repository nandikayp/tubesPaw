<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\RoomSchedule;
use Devrabiul\ToastMagic\Facades\ToastMagic;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::with(['user', 'room', 'schedule'])->latest()->paginate(10);
        return view('admin.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'room_id' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'status' => 'required',
            'purpose' => 'required|string|max:255',
        ]);


        $reservation = Reservation::create([
            'user_id' => $request->user_id,
            'room_id' => $request->room_id,
            'start_time' => Carbon::parse($request->start_time)->setTimeFrom(now())->format('Y-m-d H:i:s'),
            'end_time' => Carbon::parse($request->end_time)->setTimeFrom(now())->format('Y-m-d H:i:s'),
            'status' => $request->status,
            'purpose' => $request->purpose,
        ]);
        // Update room_schedule with the reservation_id
        $roomSchedule = RoomSchedule::where('room_id', $request->room_id)
            ->where('booked_start', $request->start_time)
            ->where('booked_end', $request->end_time)
            ->firstOrFail();

        $roomSchedule->update([
            'reservation_id' => $reservation->id,
        ]);

        ToastMagic::success('Reservation created successfully');

        return redirect()->route('rooms.detail', $request->room_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        return view('admin.reservations.edit', compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'status' => 'required|string|in:pending,approved,rejected,completed,cancelled',
        ]);

        $reservation->update(['status' => $request->status]);

        return redirect()->route('reservations.index')->with('success', 'Reservation status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully.');
    }

    public function myBookings()
    {
        $reservations = Reservation::with(['room.category', 'schedule'])->where('user_id', auth()->id())->latest()->get();

        return view('mybookings', compact('reservations'));


    }

    public function cancel(Reservation $reservation)
    {
        if ($reservation->user_id !== auth()->id()) {
            abort(403);
        }

        if ($reservation->status !== 'pending') {
            return back()->with('error', 'Only pending reservations can be cancelled.');
        }

        $reservation->update(['status' => 'cancelled']);

        // Release the room schedule
        $roomSchedule = RoomSchedule::where('reservation_id', $reservation->id)->first();
        if ($roomSchedule) {
            $roomSchedule->update(['reservation_id' => null]);
        }

        return back()->with('success', 'Reservation cancelled successfully.');
    }
}
