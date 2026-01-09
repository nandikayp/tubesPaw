<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomSchedule extends Model
{
    /** @use HasFactory<\Database\Factories\RoomScheduleFactory> */
    use HasFactory;
    protected $table = 'room_schedule';
    protected $guarded = [];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

}
