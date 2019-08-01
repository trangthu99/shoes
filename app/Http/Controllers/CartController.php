<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\collection;
use App\Members;
use App\OrderMethod;
use App\Order;
use App\Product;
use App\OrderDetail;
use App\Prices;

class CartController extends Controller
{
	public function cart($action=null,$id=null,Request $request){
		switch ($action) {
			case 'order':
			if (session('user')):
				return redirect('order');
			else:
				return redirect('login');
			endif;
			break;

			case 'update':
			foreach (array_keys(session('cart')) as $key) {
				session([
					"cart.$key.number"=>$request->input($key."number"),
					"cart.$key.size"=>$request->input($key."size")
				]);
			}
			return redirect("cart");
			break;

			case 'add':
			if (session("cart.$id.number")){
				session(["cart.$id.number"=>session("cart.$id.number")+1]);
			}else{
				session(["cart.$id.size"=>36]);
				session(["cart.$id.number"=>1]);
			}
			return redirect("cart");
			break;

			case 'delete':
			session()->forget("cart.$id");
			return redirect('cart');
			break;
			case 'deleteall':
			session()->forget("cart");
			return redirect('cart');
			break;
			default:
			return view('cart');
			break;
		} 
	}
}