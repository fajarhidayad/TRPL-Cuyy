<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pembayaran_saldo extends Model
{
    protected $table = 'pembayaran_saldo';

    protected $fillable = [
    'user_id','jumlah', 'bukti', 'status', 'idsaldo'
  ];

  protected $primaryKey = 'id_pembayaran';

  public $timestamps = false;
}
