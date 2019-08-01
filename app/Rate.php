<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
	protected $table = 'rate';
	public $timestamps = false;
	public function user()
	{
		return $this->belongsTo(\App\User::class,'userID','id');
	}
}