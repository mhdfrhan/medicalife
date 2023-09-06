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
        \App\Models\User::factory(50)->create();

        \App\Models\User::factory()->create([
            'name' => 'Muhammad Farhan',
            'email' => 'farhan@gmail.com',
						'password' => bcrypt('password'),
						'role' => 1,
						'no_telepon' => '083173633639',
						'alamat' => 'Jl. Bandung Gg. Bandung 2 No.33'
        ]);
    }
}
