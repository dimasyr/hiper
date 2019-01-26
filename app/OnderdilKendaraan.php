<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class OnderdilKendaraan extends Model
{
    protected $table = 'onderdil_kendaraan';

    protected $fillable = [
        'nomor_seri', 'merk', 'masa_berlaku', 'tempat_pembelian', 'kategori', 'onderdil_id', 'permintaan_id'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function kadaluarsa()
    {
        return $this->created_at->addYears($this->masa_berlaku);
    }

    public function getPermintaan($queryReturn = true){
        $data = $this->belongsTo(Permintaan::class,'permintaan_id');
        return $queryReturn ? $data : $data->first();
    }

    public function getOnderdil($queryReturn = true){
        $data = $this->belongsTo(Onderdil::class,'onderdil_id');
        return $queryReturn ? $data : $data->first();
    }
}
