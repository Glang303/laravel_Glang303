<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RumahSakitSeeder::class,
            PasienSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'username' => 'testuser',
            'password' => Hash::make('password'),
        ]);
    }
}
