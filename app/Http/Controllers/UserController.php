<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\OrderRequest;
use \Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Order;

class UserController extends Controller
{
    public function getLogin()
    {
        $brands = Brand::OrderBy('brand')->get();
        return view('login', compact('brands'));
    }

    public function getRegister()
    {
        $brands = Brand::OrderBy('brand')->get();
        return view('register', compact('brands'));
    }

    public function postRegister(RegisterRequest $request)
    {
        $user = $request->only('name', 'email', 'tel');
        $user['password']=Hash::make($request->password);
        User::create($user);
        return redirect()->route('get.login');
    }

    public function postLogin(LoginRequest $request){
        $a = User::where('email',$request->email)->first();
        $role = $a->role;
        $credentials = $request->only('email', 'password');
        if ($role == "1") {
            if(Auth::attempt($credentials)){
                return redirect()->route('shop.home')->with('success','Đăng nhập thành công');
            }
            else{
                return redirect()->back()->with('error','Tài khoản hoặc mật khẩu không chính xác!');
            }
        }
        else {
            if(Auth::attempt($credentials)){
                return redirect()->route('admin.home')->with('success','Đăng nhập thành công');
            }
            else{
                return redirect()->back()->with('error','Tài khoản hoặc mật khẩu không chính xác!');
            }
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('get.login')->with('success','Đăng xuất thành công');
    }

    public function users()
    {
        $emailUser = Auth::user()->email;
        $users = User::where('email','!=',$emailUser)->OrderBy('created_at','DESC')->get();
        return view('Admin.user', compact('users'));
    }

    public function edit(User $user)
    {
        $setUser = $user->only('role');
        if($setUser['role'] == 1){
            $setUser['role'] = 0;
        }
        else{
            $setUser['role'] = 1;
        }
        if($user->update($setUser)){
            return redirect()->route('admin.users')->with('success','Xét quyền thành công');
        }
        return redirect()->back()->with('error','Xét quyền thất bại');
    }

    public function destroy(User $user)
    {
        if ($user->delete()) {
            return redirect()->back()->with('success','Xóa thành công');
        }
        return redirect()->back()->with('error','Xóa thất bại');
    }

    public function update(Request $request) {
        $data = $request->only('name', 'tel', 'address', 'email');
        $data['updated_at'] = now();
        if(Auth::user()->update($data)){
            return redirect()->back()->with('success','Thay đổi thông tin thành công');
        }
        return redirect()->back()->with('error','Thay đổi thông tin thất bại');
    }

    public function addCart(Request $request) {
        if (Auth::user()->cart) {
            $cart=Auth::user()->cart;
            $cart = json_decode($cart);
            foreach ($cart as $value) {
                if($value->idProduct == $request->idProduct && $request->size != null && $value->sizeProduct == $request->size){
                    $value->sol += $request->sol;
                    $addCart['cart'] =$cart;
                    if(Auth::user()->update($addCart)){
                        return redirect()->back()->with('success','Thêm vào giỏ hàng thành công');
                    }
                    else{
                        return redirect()->back()->with('error','Thêm vào giỏ hàng thất bại thất bại');
                    }
                }

                if($value->idProduct == $request->idProduct && $request->size == null && $value->sizeProduct == 'Liên Hệ Order'){
                    $value->sol += 1;
                    $addCart['cart'] =$cart;
                    if(Auth::user()->update($addCart)){
                        return redirect()->back()->with('success','Thêm vào giỏ hàng thành công');
                    }
                    else{
                        return redirect()->back()->with('error','Thêm vào giỏ hàng thất bại thất bại');
                    }
                }
            }
            $data = Product::where('idProduct','=',$request->only('idProduct'))->first();
            $data = json_decode($data);
            if($request->size == null){
                $data->sizeProduct = 'Liên Hệ Order';
                $data->sol = 1;
            }
            else{
                $data->sizeProduct = $request->size;
                $data->sol = $request->sol;
            }
            $cart2=$data;
            array_push($cart, $cart2);
            $addCart['cart']= $cart;
            if(Auth::user()->update($addCart)){
                return redirect()->back()->with('success','Thêm vào giỏ hàng thành công');
            }
            else{
                return redirect()->back()->with('error','Thêm vào giỏ hàng thất bại thất bại');
            }
        }
        else{
            $data = Product::where('idProduct','=',$request->only('idProduct'))->get();
            $data = json_decode($data);
            if($request->size == null){
                $data[0]->sizeProduct = 'Liên Hệ Order';
            }
            else{
                $data[0]->sizeProduct = $request->size;
            }
            if($request->sol == null){
                $data[0]->sol = 1;
            }
            else{
                $data[0]->sol = $request->sol;
            }
            $addCart['cart'] = $data;
            if(Auth::user()->update($addCart)){
                return redirect()->back()->with('success','Thêm vào giỏ hàng thành công');
            }
            else{
                return redirect()->back()->with('error','Thêm vào giỏ hàng thất bại');
            }
        }
    }

    public function thank(OrderRequest $request) {
        $order = $request->only('name', 'tel', 'address', 'note', 'sumPrice', 'email');
        if ($order['note']==null) {
            $order['note'] = "";
        }
        $order['created_at'] = now();
        $order['updated_at'] = now();
        $order['status'] = 'Đang xử lí';
        $order['idOrder'] = rand(1,1000) . '-' . rand(1,99);
        $order['product'] = json_encode($request->product);
        $client['cart'] = null;
        if (Order::create($order) && Auth::user()->update($client)) {
            $tests = Product::inRandomOrder()->limit(8)->get();
            $brands = Brand::orderBy('brand')->get();
            return view('Shop.thank', compact('brands', 'tests'));
        }
        return redirect()->back()->with('error','Đặt hàng thất bại');

    }
}
