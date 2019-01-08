<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Onderdil extends Model
{
    protected $table = 'onderdil';

    protected $fillable = [
        'nomor_seri', 'merk', 'masa_berlaku', 'tempat_pembelian', 'kategori', 'jenis_id', 'permintaan_id'
    ];

    public function getPermintaan($queryReturn = true){
        $data = $this->belongsTo(Permintaan::class,'permintaan_id');
        return $queryReturn ? $data : $data->first();
    }

    public function getJenisOnderdil($queryReturn = true){
        $data = $this->belongsTo(JenisOnderdil::class,'jenis_id');
        return $queryReturn ? $data : $data->first();
    }

}
