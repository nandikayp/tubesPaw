<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function schedules()
    {
        return $this->hasMany(RoomSchedule::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }
}
