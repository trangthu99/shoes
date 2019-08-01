<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Admin;
use App\Product;
use App\Order;
use App\OrderDetail;
use App\OrderMethod;
use App\Brand;
use App\Rate;
use App\Price;
use App\Sale;
use App\SizeProduct;

class Admincontroller extends Controller
{
    public function products(Request $request)
    {
        $products=DB::table('brand as a')->join('products as b','a.id','b.brandId')->get();
        $orderDetails=OrderDetail::select('productId')->get();
        return view('admin.product.product', compact('products','orderDetails'));

    }
     public function product(Request $request,$id)
    {
        $products=DB::table('brand as a')->join('products as b','a.id','b.brandId')->where('brandID',$id)->get();
        $orderDetails=OrderDetail::select('productId')->get();
        return view('admin.product.product', compact('products','orderDetails'));

    }
    public function searchProducts(Request $request)
    {
        $products=DB::table('brand as a')->join('products as b','a.id','b.brandId')->where('productName','like','%'.$request->keyword.'%')->get();
        $orderDetails=OrderDetail::select('productId')->get();
        return view('admin.product.product', compact('products','orderDetails'));
    }

    public function login(){
        return view('admin.login');
    }

    public function index(){
        return view('admin.admincontrolpanel');
    }

    public function postLoginAdmin(Request $request){
        $username=$request->input('username');
        $password=md5($request->input('password'));
        $admin=Admin::where('username',$username)->where('password',$password)->get();
        if(count($admin)==0){
            return redirect()->back()->with('alert','Sai tên đăng nhập hoặc mật khẩu');
        }else{
            session(['userAdmin'=>$username]);
            return redirect('admin');
        }
    }

    public function logout(){
        session()->forget('userAdmin');
        return redirect('admin');
    }

    public function productEdit($id){
        $product=Product::find($id);
        $brands=Brand::all();
        return view('admin.product.productEdit',compact('brands','product'));
    }

    public function postProductEdit($id, Request $request)
    {
     $product=Product::find($id);
     $brandId=$request->brandId;
     $brand=Brand::where('id',$brandId)->first();
     $brandName=$brand->brandName;
     $productName=$request->productName;
     $productPrice=$request->productPrice;
     $productDescription=$request->productDescription;
     $productImage=$request->file('productImage');
     if($productImage!=null){
        $image=$brandName.'/'.$productImage->getClientOriginalName();
        $productImage->move('images/'.$brandName,$image);
            // unlink('images/'.$product->productImage);
    }else{
        $image=$product->productImage;
    }

    Product::where('id',$id)->update([

        'brandId'=>$brandId,
        'productName'=>$productName,
        'productPrice'=>$productPrice,
        'productDescription'=>$productDescription,
        'productImage'=>$image
    ]);

    return redirect('admin/products');

}

public function productDelete($id=null){
    Product::where('id',$id)->delete();
    return redirect('admin/products');
}

public function insert($id=null)
{
    $product=Product::find($id);
    $hangs=Brand::all();
    return view('admin.product.productInsert',compact('hangs','product'));
}

public function postInsert(Request $request)
{
    $brandId=$request->brand_id;
    $productName=$request->product_name;
    $productPrice=$request->product_price;
    $productDescription=$request->product_description;
    $status=$request->status;
    $productImage=$request->productImage;
    $image=$request->$productImage;
    Product::insert([

        'brandId'=>$brandId,
        'productName'=>$productName,
        'productPrice'=>$productPrice,
        'productDescription'=>$productDescription,
        'status'=>$status,
        'productImage'=>$image,
    ]);
    return redirect('admin/products');
}

    //Add

    //Rates
//Rates
public function rates()
{
    $products=Product::all();

    return view('admin.rate.rate',compact('products'));

}

public function rate($id)
{
    $products=Product::where('brandID',$id)->get();

    return view('admin.rate.rate',compact('products'));
}

public function rateDetail($id=null)
{
    $product=Product::find($id);

    $productComments = $product->product_comments()->with('user')->get();

    $countrate = Rate::where('ProductID',$id)->count('userID');

    return view('admin.rate.rateDetail',compact('productComments','countrate'));

}

public function rateDelete($id){
    Rate::where('id',$id)->delete();
    return redirect()->back();
}
    //Brands
public function brands()
{
    $brands = Brand::get();
    return view('admin.brand.brand',compact('brands'));
}
public function getBrandInsert()
{
    return view('admin.brand.brandInsert');
}
public function postBrandInsert(Request $request)
{
    $brandName = $request->brandName;
    $status = $request->status;

    Brand::insert([
        'brandName'=>$brandName,
        'status'=>$status
    ]);

    return redirect('admin/brands');
}
public function brandDelete($id){
    Brand::where('id',$id)->delete();
    return redirect()->back();
}
public function getBrandEdit($id){
    $brands=Brand::where('id',$id)->get();
    return view('admin.brand.brandEdit',compact('brands'));
}
public function postBrandEdit(Request $request,$id){
    $brandName = $request->brandName;
    $status = $request->status;

    Brand::where('id',$id)->update([
        'brandName'=>$brandName,
        'status'=>$status
    ]);

    return redirect('admin/brands');
}

    //Order Method
public function ordermethods()
{
    $ordermethods = Ordermethod::get();
    return view('admin.order_method.orderMethod',compact('ordermethods'));
}
public function getOrderMethodInsert()
{
    return view('admin.order_method.orderMethodInsert');
}
public function postOrderMethodInsert(Request $request)
{
    $methodName = $request->methodName;
    $status = $request->status;

    Ordermethod::insert([
        'methodName'=>$methodName,
        'status'=>$status
    ]);

    return redirect('admin/ordermethods');
}
public function ordermethodDelete($id){
    Ordermethod::where('id',$id)->delete();
    return redirect()->back();
}
public function getordermethodEdit($id){
    $ordermethods=Ordermethod::where('id',$id)->get();
    return view('admin.order_method.orderMethodEdit',compact('ordermethods'));
}
public function postordermethodEdit(Request $request,$id){
    $methodName = $request->methodName;
    $status = $request->status;

    ordermethod::where('id',$id)->update([
        'methodName'=>$methodName,
        'status'=>$status
    ]);

    return redirect('admin/ordermethods');
}

    //Order
public function order($id){
    $orders=Order::where('status',$id)->get();
    return view('admin.order.order',compact('orders'));
}
public function orders(){
    $orders=Order::all();
    return view('admin.order.order',compact('orders'));
}
public function orderDelete($id){
    Order::where('id',$id)->delete();
    return redirect()->back();
}
public function getorderEdit($id){
    $order=Order::where('id',$id)->first();
    $orderDetails=OrderDetail::where('orderId',$id)->get();
    return view('admin.order.orderEdit',compact('order','orderDetails'));
}
public function postorderEdit(Request $request,$id){
    $status = $request->status;
    Order::where('id',$id)->update([
        'status'=>$status
    ]);

    return redirect('admin/order');
}

//Admins

public function adminDelete($id=null){

    Admin::where('id',$id)->delete();

    return redirect('admin/users');
}

public function admins(Request $request){
    $admins=DB::table('admin')->get();
    return view('admin.user.user', compact('admins'));

}
public function getEdit($id){
    $admins=Admin::where('id',$id)->get();
    return view('admin.user.userEdit',compact('admins'));
}
public function adminEdit($id, Request $request)
{

    Admin::where('id',$id)->update([
        'username'=>$request->username,
        'password'=>md5($request->newpassword),
        'status'=>$request->status,
    ]);

    return redirect('admin/users');

}
public function getInsert()
{

    return view('admin.user.userInsert');
}

public function adminInsert(Request $request)
{

    $username=$request->username;
    $password=md5($request->password);
    $status=$request->status;

    Admin::insert([
        'username'=>$username,
        'password'=>$password,
        'status'=>$status
    ]);
    return redirect('admin/users');

}

//Prices
public function prices(Request $request){
    $prices=DB::table('prices')->get();
    return view('admin.price.price', compact('prices'));

}

public function priceEdit($id){
    $prices=Price::where('id',$id)->get();
    return view('admin.price.priceEdit',compact('prices'));
}
public function postPriceEdit($id, Request $request)
{

    Price::where('id',$id)->update([
        'priceName'=>$request->pricename,
        'priceFrom'=>$request->pricefrom,
        'priceTo'=>$request->priceto,
    ]);

    return redirect('admin/prices');

}
public function priceDelete($id=null){

    Price::where('id',$id)->delete();

    return redirect('admin/prices');
}

public function priceInsert()
{

    return view('admin.price.priceInsert');
}

public function postPriceInsert(Request $request)
{

    Price::insert([
        'priceName'=>$request->pricename,
        'priceFrom'=>$request->pricefrom,
        'priceTo'=>$request->priceto,
    ]);
    return redirect('admin/prices');

}

//Sales

public function sales(Request $request){
    $sales=DB::table('sales')->get();
    return view('admin.sale.sale', compact('sales'));

}
public function saleEdit($id){
    $sales=Sale::where('id',$id)->get();
    return view('admin.sale.saleEdit',compact('sales'));
}
public function postSaleEdit($id, Request $request)
{

    Sale::where('id',$id)->update([
        'sale'=>$request->sale,
        'price'=>$request->price,
    ]);

    return redirect('admin/sales');

}
public function saleInsert()
{

    return view('admin.sale.saleInsert');
}

public function postSaleInsert(Request $request)
{

    Sale::insert([
        'sale'=>$request->sale,
        'price'=>$request->price,
    ]);
    return redirect('admin/sales');

}
public function saleDelete($id=null){

    Sale::where('id',$id)->delete();

    return redirect('admin/sales');
}
public function productSize()
{
    $productSizes =Product::where('status',1)->get();
    return view('admin.product_size.productSize',compact('productSizes'));
}
public function productSizes($id){
    $productSizes=Product::where('status',1)->where('brandID',$id)->get();
    return view('admin.product_size.productSize',compact('productSizes'));
}
public function productSizeDetail($id)
{
    $product=Product::find($id);
    $productSizes=SizeProduct::where('productId',$id)->get();
    return view('admin.product_size.productSizeDetail', compact('productSizes','product'));
}

// public function productSizeDelete($id=null)
// {
//     SizeProduct::where('id',$id)->delete();
//     return redirect('admin/productSizes');
// }

// public function productSizeInsert()
// {
//     return view('admin.product_size.productSizeInsert');
// }

// public function postProductSizeInsert(Request $request)
// {
//     SizeProduct::insert([
//         'productId'=>$request->productid,
//         'sizeId'=>$request->sizeid,
//         'quantity'=>$request->quantity
//     ]);
//     return redirect('admin/productSizes');
// }

public function productSizeEdit($id)
{
    $productSizes=SizeProduct::find($id);
    return view('admin.product_size.productSizeEdit',compact('productSizes'));
}
public function postProductSizeEdit(Request $request,$id)
{   
    $productId = SizeProduct::where('id',$id)->first();
    SizeProduct::where('id',$id)->update([
        'quantity'=>$request->quantity
    ]);
    return redirect('admin/productSizeDetail/'.$productId->productId);
}

}