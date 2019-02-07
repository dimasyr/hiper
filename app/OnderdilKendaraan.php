<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OnderdilKendaraan extends Model
{
    use SoftDeletes;

    protected $table = 'onderdil_kendaraan';

    protected $fillable = [
        'nomor_seri', 'merk', 'ukuran', 'masa_berlaku', 'jumlah', 'harga', 'tempat_pembelian', 'kategori', 'onderdil_id', 'permintaan_id', 'created_at', 'updated_at'
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
