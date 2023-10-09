<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;

class ShopController extends Controller
{
    public function home()
    {
        $categories = Brand::OrderBy('brand')->limit(5)->get();
        $products = Product::OrderBy('created_at', 'DESC')->limit(6)->get();
        $product2s = Product::OrderBy('created_at')->limit(6)->get();
        $brands = Brand::OrderBy('brand')->get();
        return view('Shop.home', compact('products', 'brands', 'product2s', 'categories'));
    }

    public function singleProduct($idProduct)
    {
        $product = Product::where('idProduct',$idProduct)->first();
        $product2s = Product::where('idProduct','!=', $idProduct)->inRandomOrder()->limit(6)->get();
        $product->sizeProduct = explode(',',$product->sizeProduct);
        $brands = Brand::OrderBy('brand')->get();
        return view('Shop.singleProduct', compact('product', 'brands', 'product2s'));
    }

    public function listAll($brand)
    {
        if ($brand == "All") {
            $products = Product::OrderBy('created_at','DESC')->paginate(9);
        }
        else{
            $products = Product::where('brand',$brand)->OrderBy('created_at','DESC')->paginate(9);
        }
        $categories = Brand::OrderBy('brand')->limit(5)->get();
        $specials =Product::inRandomOrder()->limit(2)->get();
        $brands = Brand::OrderBy('brand')->get();
        return view('Shop.list', compact('products', 'brands', 'brand', 'categories', 'specials'));
    }

    public function search(Request $request)
    {
        $brand = $request['search'];
        $products = Product::where('nameProduct','LIKE', "%{$brand}%")->OrderBy('created_at','DESC')->paginate(9);
        $categories = Brand::OrderBy('brand')->limit(5)->get();
        $specials =Product::inRandomOrder()->limit(2)->get();
        $brands = Brand::orderBy('brand')->get();
        return view('Shop.list', compact('brands', 'products', 'brand', 'categories', 'specials'));
    }

    public function myAccount()
    {
        $email = Auth::user()->email;
        $orders = Order::where('email',$email)->orderBy('created_at','DESC')->get();
        foreach ($orders as $order) {
            $order->product = json_decode($order->product);
        }
        $brands = Brand::orderBy('brand')->get();
        return view('Shop.myAccount', compact('brands', 'orders'));
    }

    public function cart()
    {
        $brands = Brand::orderBy('brand')->get();
        return view('Shop.cart', compact('brands'));
    }

    public function updateCartPost(Request $request)
    {
        $a = $request->only('product');
        $cart=Auth::user()->cart;
        $cart = json_decode($cart);
        $i = 0;
        foreach ($cart as $value) {
            if ($a['product'][$i]['sol'] < 0) {
                $value->sol = 0;
            }
            else{
                $value->sol = $a['product'][$i]['sol'];
            }
            $i++;
        }
        $addCart['cart'] =$cart;
        Auth::user()->update($addCart);
        return response()->json($cart);
    }

    public function deleteCart($i) {
        $carts = Auth::user()->cart;
        $carts = json_decode($carts);
        for ($j=$i; $j < count(cartData()) - 1; $j++) {
            $carts[$j] = $carts[$j+1];
        }
        unset($carts[count(cartData())-1]);
        $addCart['cart']= $carts;
        if(Auth::user()->update($addCart)){
            return redirect()->back()->with('success','Xóa sản phẩm thành công');
        }
        else{
            return redirect()->back()->with('error','Xóa sản phẩm thất bại');
        }
    }

    public function checkOut(Request $request)
    {
        $products = $request['product'];
        $sumPrice = 0;
        for ($i=0; $i < count($products); $i++) {
            if($products[$i]['sol']  < 0) {
                $products[$i]['sol'] = 0;
            }
            $sumPrice += $products[$i]['price']*$products[$i]['sol'];
        }
        $brands = Brand::orderBy('brand')->get();
        return view('Shop.checkOut', compact('brands', 'products'));
    }


}
