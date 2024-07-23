<?php

namespace Database\Factories;

use App\Models\Kursus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();

        $availableKursusIds = Kursus::whereDoesntHave('transaksis', function($query) use ($user) {
            $query->where('peserta_id', $user->id);
        })->pluck('id')->toArray();

        if (empty($availableKursusIds)) {
            throw new \Exception('No available kursus IDs for user: ' . $user->id);
        }

        $kursusId = $this->faker->randomElement($availableKursusIds);
        $kursus = Kursus::find($kursusId);
        return [
            'faktur' => $this->faker->unique()->numerify('FAK-#####'),
            'peserta_id' => $user->id,
            'kursus_id' => $this->faker->randomElement($availableKursusIds),
            'harga' => $kursus->harga,
            'catatan' => $this->faker->sentence,
        ];
    }
}
