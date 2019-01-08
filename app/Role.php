<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';

    protected $fillable = [
        'nama'
    ];

    public function getUser($queryReturn = true){
        $data = $this->hasMany('App\User','role_id');
        return $queryReturn ? $data : $data->get();
    }
}
