<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = \App\Models\Room::all();
        foreach ($rooms as $room) {
            \App\Models\Facility::factory()->count(rand(2, 5))->create(['room_id' => $room->id]);
        }
    }
}
