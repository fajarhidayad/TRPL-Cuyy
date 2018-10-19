<?php

namespace App\Models;
use Auth;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
  protected $table = 'produk';
protected $primaryKey = 'id_produk';
protected $fillable = [
      'foto_produk', 'nama_produk', 'deskripsi', 'harga', 'stok','berat','kondisi_barang','slug_produk', 'toko_id'
  ];

  public $timestamps=false;

  public function user(){
    return $this->belongsTo('App\Models\User');
  }

}
