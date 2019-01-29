<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlatBerat extends Model
{
    protected $table = 'alat_berat';

    protected $fillable = [
        'nama', 'tahun'
    ];
}
