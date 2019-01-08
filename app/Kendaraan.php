<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'kendaraan';

    protected $fillable = [
      'plat_nomor', 'nomor_rangka', 'nomor_mesin', 'stnk', 'pajak', 'kir', 'supir_id', 'jenis_kendaraan_id'
    ];
}
