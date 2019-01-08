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


}
