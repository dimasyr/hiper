<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Kendaraan;
use Carbon\Carbon;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $json = file_get_contents()
//        dd(json_decode(Storage::get('kendaraan.json')));
        foreach (json_decode(Storage::get('kendaraan.json')) as $row) {
            Kendaraan::create([
                'plat_nomor' => $row->plat_nomor,
                'nomor_rangka' => $row->nomor_rangka,
                'nomor_mesin' => $row->nomor_mesin,
                'stnk' => (!is_null($row->stnk) ? Carbon::createFromFormat('d/m/Y H:i:s', $row->stnk . ' 00:00:00') : null ),
                'pajak' => (!is_null($row->pajak) ? Carbon::createFromFormat('d/m/Y H:i:s', $row->pajak . ' 00:00:00') : null ),
                'kir' => (!is_null($row->kir) ? Carbon::createFromFormat('d/m/Y H:i:s', $row->kir . ' 00:00:00') : null ),
                'supir_id' => $row->supir_id,
                'jenis_kendaraan_id' => $row->jenis_kendaraan_id
            ]);
        }
    }
}
