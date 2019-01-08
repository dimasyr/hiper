<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    protected $table = 'permintaan';

    protected $fillable = [
        'supir_id', 'teknisi_id', 'operator_id', 'kendaraan_id'
    ];

    public function getKendaraan($queryReturn = true ){
        $data = $this->belongsTo(Kendaraan::class,'kendaraan_id');
        return $queryReturn ? $data : $data->first();
    }

    public function getSupir($queryReturn = true ){
        $data = $this->belongsTo(User::class,'supir_id');
        return $queryReturn ? $data : $data->first();
    }

    public function getTeknisi($queryReturn = true ){
        $data = $this->belongsTo(User::class,'teknisi_id');
        return $queryReturn ? $data : $data->first();
    }

    public function getOperator($queryReturn = true ){
        $data = $this->belongsTo(User::class,'operator_id');
        return $queryReturn ? $data : $data->first();
    }

    public function getOnderdil($queryReturn = true ){
        $data = $this->hasMany(Onderdil::class,'permintaan_id');
        return $queryReturn ? $data : $data->get();
    }
}