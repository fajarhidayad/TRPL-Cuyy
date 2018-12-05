<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class gruplelang extends Model
{
	protected $table = 'gruplelang';
	protected $primaryKey = 'idgrup';
	protected $fillable = [
		'nama_produk', 'deskripsi', 'harga_awal', 'foto_produk', 'iduser', 'setuju', 'idlelang',
	];

	public $timestamps=false;
}
