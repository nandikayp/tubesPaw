<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Documents>
 */
class DocumentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reservation_id' => \App\Models\Reservation::factory(),
            'doc_type' => $this->faker->randomElement(['proposal', 'letter']),
            'file_path' => 'documents/' . $this->faker->uuid() . '.pdf',
        ];
    }
}
