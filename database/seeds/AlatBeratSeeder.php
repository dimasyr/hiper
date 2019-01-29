<?php

use Illuminate\Database\Seeder;
use App\AlatBerat;

class AlatBeratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AlatBerat::create([
            'nama' => 'TRAKTOR A',
            'tahun' => '1997'
        ]);

        AlatBerat::create([
            'nama' => 'TRAKTOR B',
            'tahun' => '1994'
        ]);

        AlatBerat::create([
            'nama' => 'TRAKTOR C',
            'tahun' => '1994'
        ]);

        AlatBerat::create([
            'nama' => 'TRAKTOR D',
            'tahun' => '1990'
        ]);

        AlatBerat::create([
            'nama' => 'EXCAVATOR',
            'tahun' => '2006'
        ]);
    }
}
