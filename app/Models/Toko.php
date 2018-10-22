<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{

  protected $table='toko';
  protected $fillable = [
      'nama_toko', 'alamat_toko', 'telepon', 'deskripsi','foto_toko', 'user_id'
  ];

  protected $primaryKey = 'id_toko';
  public $timestamps=true;

    public function user(){
      return $this->hasOne('App\Models\User');
    }

    public function produk()
    {
        return $this->hasMany('App\Models\produk');
    }

}
