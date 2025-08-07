<?php

namespace Database\Seeders;

use App\Models\Pasien;
use App\Models\RumahSakit;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID'); 
        $rumahSakitIds = RumahSakit::pluck('id');

        if ($rumahSakitIds->isEmpty()) {
            return;
        }

        for ($i = 0; $i < 10; $i++) {
            Pasien::create([
                'nama' => $faker->name,
                'alamat' => $faker->address,
                'no_hp' => $faker->phoneNumber,
                'rumah_sakit_id' => $faker->randomElement($rumahSakitIds),
            ]);
        }
    }
}
