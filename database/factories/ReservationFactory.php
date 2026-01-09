<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startTime = $this->faker->dateTimeBetween('now', '+1 month');
        $endTime = (clone $startTime)->modify('+2 hours');

        return [
            'user_id' => \App\Models\User::factory(),
            'room_id' => \App\Models\Room::factory(),
            'start_time' => $startTime,
            'end_time' => $endTime,
            'purpose' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}
