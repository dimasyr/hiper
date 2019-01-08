<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'role_id', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Mendapatkan data hak akses pengguna
     *
     * @param bool $queryReturn
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|object|null
     */
    public function getRole($queryReturn = true){
        $data = $this->belongsTo(Role::class,'role_id');
        return $queryReturn ? $data : $data->first();
    }

    /**
     * Mendapatkan kendaraan yg dipakai supir
     *
     * @param bool $queryReturn
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getKendaraan($queryReturn = true){
        $data = $this->hasMany(Kendaraan::class,'supir_id');
        return $queryReturn ? $data : $data->get();
    }

    /**
     * Mendapatkan permintaan yang pernah diajukan supir
     *
     * @param bool $queryReturn
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getPermintaanSupir($queryReturn = true){
        $data = $this->hasMany(Permintaan::class,'supir_id');
        return $queryReturn ? $data : $data->get();
    }

    /**
     * Mendapatkan permintaan yang pernah diteruskan oleh teknisi
     *
     * @param bool $queryReturn
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getPermintaanTeknisi($queryReturn = true){
        $data = $this->hasMany(Permintaan::class,'teknisi_id');
        return $queryReturn ? $data : $data->get();
    }

    /**
     * Mendapatkan permintaan yang pernah ditindaklanjuti oleh operator
     *
     * @param bool $queryReturn
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getPermintaanOperator($queryReturn = true){
        $data = $this->hasMany(Permintaan::class,'operator_id');
        return $queryReturn ? $data : $data->get();
    }
}
