<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{

  protected $fillable = [
      'nama_toko', 'alamat_toko', 'telepon', 'deskripsi','foto_toko'
  ];

    public function user(){
      return $this->hasOne('App\Models\User');
    }
}
