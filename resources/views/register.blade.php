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
                        <li>Đăng kí</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!-- customer login start -->
    <div class="customer_login">
        <div class="row">
            <div class="col-lg-3 col-md-3 "></div>

            <!--register area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form register">
                    <h2>Đăng kí</h2>
                    <form action="{{ route('post.register') }}" method="POST">
                        @csrf
                        @if ($errord = session()->get('errors'))
                            @foreach ($errors->messages() as $key => $error)
                                <i style="color: red">{{ $error[0] }}</i>
                            @endforeach
                        @endif
                        <p>
                            <label>Tên người dùng <span>*</span></label>
                            <input type="text" name="name">
                        </p>
                        <p>
                            <label>Số điện thoại <span>*</span></label>
                            <input type="text" name="tel" pattern="[0]{1}[1-9]{1}[0-9]{8}">
                        </p>
                        <p>
                            <label>Email <span>*</span></label>
                            <input type="text" name="email">
                        </p>
                        <p>
                            <label>Mật khẩu <span>*</span></label>
                            <input type="password" name="password">
                        </p>
                        <div class="login_submit">
                            <button type="submit">Đăng kí</button>
                            <a href="{{ route('get.login') }}">Đã có tài khoản!</a>
                        </div>
                    </form>
                </div>
            </div>
            <!--register area end-->
        </div>
    </div>
    <!-- customer login end -->
@endsection
