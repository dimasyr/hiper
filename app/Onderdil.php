<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Onderdil extends Model
{
    protected $table = 'onderdil';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama'
    ];

    public function getOnderdilKendaraan($queryReturn = true){
        $data = $this->hasMany(OnderdilKendaraan::class,'onderdil_id');
        return $queryReturn ? $data : $data->get();
    }
}
