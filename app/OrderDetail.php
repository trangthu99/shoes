<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
	protected $table='order_detail';
	public $timestamp=false;
	public function orderdetail()
	{

		return $this->hasOne(\App\Order::class);

	}
	public function product()
	{

		return $this->belongsTo(\App\Product::class,'productId','id');

	}
}
