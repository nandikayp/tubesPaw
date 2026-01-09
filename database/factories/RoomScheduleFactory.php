<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RoomSchedule>
 */
class RoomScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'room_id' => \App\Models\Room::factory(),
            'reservation_id' => \App\Models\Reservation::factory(),
            'date' => $this->faker->date(),
            'booked_start' => $this->faker->time('H:i'),
            'booked_end' => $this->faker->time('H:i'),
        ];
    }
}
