<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class keranjang extends Model
{
  protected $table = 'keranjang';
protected $primaryKey = 'idkeranjang';
protected $fillable = [
      'jumlah', 'user_id', 'idbarang',
  ];

  public $timestamps=true;
}
