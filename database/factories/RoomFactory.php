<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'roomname' => $this->faker->word() . ' Room',
            'capacity' => $this->faker->numberBetween(10, 100),
            'description' => $this->faker->sentence(),
            'image' => 'https://via.placeholder.com/640x480.png/007799?text=rooms+set',
            'category_id' => \App\Models\Category::factory(),
        ];
    }
}
