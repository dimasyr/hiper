<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisKendaraan extends Model
{
    protected $table = 'jenis_kendaraan';

    protected $fillable = [
        'nama'
    ];

    public function getKendaraan($queryReturn = true){
        $data = $this->hasMany('App\Kendaraan','jenis_kendaraan_id');
        return $queryReturn ? $data : $data->get();
    }
}
