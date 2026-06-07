<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        \DB::table('status')->insertOrIgnore([
            ['id_status' => 1, 'deskripsi' => 'dipinjam'],
            ['id_status' => 2, 'deskripsi' => 'perlu pengingat'],
            ['id_status' => 3, 'deskripsi' => 'dikembalikan'],
        ]);
    }
}
