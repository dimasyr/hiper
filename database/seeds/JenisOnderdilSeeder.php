<?php

use Illuminate\Database\Seeder;
use App\JenisOnderdil;

class JenisOnderdilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Filter Solar',
            'Filter Oli',
            'Filter Udara',
            'Kampas Kopling',
            'Master Kopling (Atas Bawah)',
            'Kampas Rem',
            'Ban',
            'Baut Roda',
            'Laker Roda',
            'Sil Roda',
            'Karet Rem',
            'Stempet',
            'Karet Gantung (Join)',
            'Minyak Power',
            'Minyak Rem',
            'Oli',
            'Air Radiator',
            'Terod',
            'Nosle',
            'Vanbel'
        ];

        foreach ($data as $nama) {
            JenisOnderdil::create([
                'nama' => $nama
            ]);
        }
    }
}
