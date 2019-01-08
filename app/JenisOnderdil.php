<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisOnderdil extends Model
{
    protected $table = 'jenis_onderdil';

    protected $primaryKey = 'id';

    protected $fillable = [
      'nama'
    ];

    public function getOnderdil($queryReturn = true){
        $data = $this->hasMany(Onderdil::class,'jenis_id');
        return $queryReturn ? $data : $data->get();
    }
}
