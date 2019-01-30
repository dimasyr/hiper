<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Onderdil extends Model
{
    use SoftDeletes;

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
