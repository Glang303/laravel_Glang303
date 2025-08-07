<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class RumahSakitSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('rumah_sakits')->insert([
                'nama_rumah_sakit' => 'RS GILANG ' . $i,
                'alamat' => 'Jl. GILANG No. ' . $i,
                'email' => 'rsdummy' . $i . '@contoh.com',
                'telepon' => '0812345678' . $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
