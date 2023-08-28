<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(100)->create();

        \App\Models\User::factory()->create([
            'name' => 'Muhammad Farhan',
            'email' => 'farhan@gmail.com',
						'password' => bcrypt('password'),
						'role' => 1,
						'no_telepon' => '083173633639',
						'alamat' => 'Jl. Bandung Gg. Bandung 2 No.33'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'User 1',
            'email' => 'user@gmail.com',
						'password' => bcrypt('password'),
						'role' => 0,
						'no_telepon' => '082374833920',
						'alamat' => 'Jl. Sudirman No.100'
        ]);
    }
}
