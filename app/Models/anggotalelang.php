<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class anggotalelang extends Model
{
    protected $table = 'anggotalelang';
	protected $primaryKey = 'id_anggota';
	protected $fillable = [
		'nama_anggota', 'harga', 'id_user', 'id_grup',
	];

	public $timestamps=false;
}
