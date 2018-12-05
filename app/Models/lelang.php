<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lelang extends Model
{
	protected $table = 'lelang';
	protected $primaryKey = 'id_lelang';

	protected $fillable = [
      'nama_lelang', 'deskripsi', 'foto_event', 'status',
  ];

  public $timestamps=false;
}
