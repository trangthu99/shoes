<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderMethod extends Model
{
	protected $table = 'ordermethod';
	public $timestamps = false;
	public function orders()
	{

		return $this->hasMany(\App\Order::class,'methodId','id');

	}
}
