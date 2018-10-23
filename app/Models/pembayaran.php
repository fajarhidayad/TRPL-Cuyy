<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
  protected $table = 'pembayaran';
protected $primaryKey = 'idpembayaran';
protected $fillable = [
      'jumlah', 'user_id', 'idbarang', 'statuspembayaran', 'buktitransfer'
  ];

  public $timestamps=true;
}
