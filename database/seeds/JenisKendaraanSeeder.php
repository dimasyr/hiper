<?php

use Illuminate\Database\Seeder;
use App\JenisKendaraan;

class JenisKendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        JenisKendaraan::create([
            'nama' => 'GANDENG'
        ]);

        //2
        JenisKendaraan::create([
            'nama' => 'COLT DIESEL'
        ]);
    }
}
