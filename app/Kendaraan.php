<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kendaraan extends Model
{
    use SoftDeletes;

    protected $table = 'kendaraan';

    protected $fillable = [
      'plat_nomor', 'nomor_rangka', 'nomor_mesin', 'stnk', 'pajak', 'kir', 'supir_id', 'jenis_kendaraan_id'
    ];

    public function getSupir($queryReturn = true ){
        $data = $this->belongsTo('App\User','supir_id');
        return $queryReturn ? $data : $data->first();
    }

    public function getJenisKendaraan($queryReturn = true){
        $data = $this->belongsTo('App\JenisKendaraan','jenis_kendaraan_id');
        return $queryReturn ? $data : $data->first();
    }
}
