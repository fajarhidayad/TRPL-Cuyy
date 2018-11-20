<?php

namespace App\Models;

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
        'name', 'email', 'password','alamat','kelurahan','kecamatan','kabupaten','provinsi','jenis_kelamin','tanggal_lahir','telepon','sosmed','kartu_kredit','foto', 'level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function quotes()
    {
        return $this->hasMany('App\Models\Quote');
    }

    public function comments(){
        return $this->hasMany('App\Models\QuoteComment');
    }

    public function produks(){
      return $this->hasMany('App\Models\produk');
    }

    public function toko(){
      return $this->hasOne('App\Models\Toko');
    }

}
