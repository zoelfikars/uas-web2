<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use App\Models\Pelajaran;
use App\Models\PelajaranMateri;
use App\Models\Transaksi;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Materi::factory()->count(30)->create();
        // Kursus::factory()->count(20)->hasMateri(2)->create();
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin1234',
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'ane',
            'email' => 'ane@gmail.com',
            'password' => 'ane1234',
            'role' => 'user',
        ]);
        User::factory()->create([
            'name' => 'yushela',
            'email' => 'yushela@gmail.com',
            'password' => 'yushela1234',
            'role' => 'user',
        ]);
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => 'user1234',
            'role' => 'user',
        ]);
        Jadwal::factory()->count(30)->create();
        Transaksi::factory()->count(40)->create();
    }
}
