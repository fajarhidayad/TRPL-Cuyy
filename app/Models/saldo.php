<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class saldo extends Model
{
	protected $table = 'saldo';
    protected $fillable = [
    'saldo','iduser'
  ];

  public $primaryKey = 'idsaldo';
  public $timestamps = false;

  public function user(){
      return $this->belongsTo('App\Models\User');
  }
}
