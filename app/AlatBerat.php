<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AlatBerat extends Model
{
    use SoftDeletes;

    protected $table = 'alat_berat';

    protected $fillable = [
        'nama', 'tahun'
    ];
}
