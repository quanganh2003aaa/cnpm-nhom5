@extends('Shop.master')
@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.html">Trang chủ</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>Đăng nhập</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!-- customer login start -->
    <div class="customer_login">
        <div class="row">
            <!--login area start-->
            <div class="col-lg-3 col-md-3 "></div>
            <div class="col-lg-6 col-md-6 ">
                <div class="account_form">
                    <h2 >Đăng nhập</h2>
                    @if ($errord = session()->get('errors'))
                                            @foreach ($errors->messages() as $key => $error)
                                                <i style="color: red">{{$error[0]}}</i>
                                            @endforeach
                                        @endif
                    <form action="{{route('post.login')}}" method="POST">
                        @csrf
                        <p>
                            <label>Email<span>*</span></label>
                            <input type="text" name="email">
                        </p>
                        <p>
                            <label>Mật khẩu <span>*</span></label>
                            <input type="password" name="password">
                        </p>
                        <div class="login_submit">
                            <button type="submit">Đăng nhập</button>
                            <a href="{{route('get.register')}}">Chưa có tài khoản!</a>
                        </div>

                    </form>
                </div>
            </div>
            <!--login area start-->
        </div>
    </div>
    <!-- customer login end -->
@endsection
