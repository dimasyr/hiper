<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kendaraan extends Model
{
    use SoftDeletes;

    protected $table = 'kendaraan';

    protected $primaryKey = 'plat_nomor';

    protected $keyType = 'string';

    public $incrementing = false;

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

    public function getPermintaan($queryReturn = true){
        $data = $this->hasMany(Permintaan::class,'kendaraan_id');
        return $queryReturn ? $data : $data->get();
    }

    public function getOnderdil($queryReturn = true)
    {
        $data = OnderdilKendaraan::query()->whereIn('permintaan_id', function ($query) {
            $query->from('permintaan')->select('id')->where('kendaraan_id', $this->plat_nomor);
        });

        return $queryReturn ? $data : $data->get();
    }

    public function getStatusOnderdil($onderdil_id)
    {
        $onderdil = $this->getOnderdil()->where('onderdil_id', $onderdil_id)->orderByDesc('created_at')->first();
        if($onderdil != null){
            $total_hari = $onderdil->masa_berlaku*365;
            $hari_sekarang = Carbon::now();
            $sisa_hari = $hari_sekarang->diffInDays($onderdil->created_at->addYears($onderdil->masa_berlaku));
            $status = abs(($total_hari-$sisa_hari)/$total_hari)*100;

            return $status;
        }
        else return null;

    }
}
