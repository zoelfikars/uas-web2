<?php

namespace Database\Factories;

use App\Models\Kursus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Materi>
 */
class MateriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kursus_id' => Kursus::factory()->create(),
            'judul' => $this->faker->word(),
            'deskripsi' => $this->faker->paragraph,
        ];
    }
}
