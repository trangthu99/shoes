<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = 'orders';
	public $timestamps = false;
	public function user()
	{

		return $this->belongsTo(\App\User::class,'userId','id');

	}
	public function method()
	{

		return $this->belongsTo(\App\OrderMethod::class,'methodId','id');

	}
	public function orderdetail()
	{

		return $this->hasOne(\App\OrderDetail::class);

	}
}
