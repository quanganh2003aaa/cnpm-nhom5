<!--header area -->
<div class="header_area">
    <!--header top-->
    <div class="header_top">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-6">
                <div class="header_links">
                    <ul>
                        @if (Auth::user())
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="logout">
                                        Đăng xuất
                                    </button>
                                </form>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--header top end-->

    <!--header middel-->
    <div class="header_middel">
        <div class="row align-items-center">
            <!--logo start-->
            <div class="col-lg-3 col-md-3">
                <div class="logo">
                    <a href="{{ route('shop.home') }}"><img src="{{ asset('assets/img/logo/logo2.png') }}"
                            alt=""></a>
                </div>
            </div>
            <!--logo end-->
            <div class="col-lg-9 col-md-9">
                <div class="header_right_info">
                    <div class="search_bar">
                        <form action="{{ route('shop.search') }}" method="GET">
                            <input placeholder="Search..." type="text" name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="shopping_cart">
                        @if (Auth::user() && Auth::user()->cart != null)
                            <a href="#"><i class="fa fa-shopping-cart"></i> {{ countCart() }} sản phẩm <i
                                    class="fa fa-angle-down"></i></a>
                            <!--mini cart-->
                            <div class="mini_cart">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach (cartData() as $pro)
                                    <div class="cart_item">
                                        <div class="cart_img">
                                            <a href="{{ route('shop.singleProduct', $pro->idProduct) }}"><img
                                                    src="{{ asset($pro->imgProduct) }}" alt=""></a>
                                        </div>
                                        <div class="cart_info">
                                            <a
                                                href="{{ route('shop.singleProduct', $pro->idProduct) }}">{{ $pro->nameProduct }}</a>
                                            <span class="cart_price">{{ number_format($pro->priceProduct) }}đ</span>
                                            <span class="quantity">SoL: {{ $pro->sol }}</span>
                                        </div>
                                        <div class="cart_remove">
                                            <a title="Remove this item" href="{{ route('shop.deleteCart', $i) }}"><i
                                                    class="fa fa-times-circle"></i></a>
                                        </div>
                                    </div>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                                <div class="total_price">
                                    <span> Tổng: </span>
                                    <span class="prices"> {{ number_format(sumPrice()) }}đ </span>
                                </div>
                                <div class="cart_button">
                                    <a href="{{ route('shop.cart') }}">Đi đến giỏ hàng</a>
                                </div>
                            </div>
                            <!--mini cart end-->
                        @else
                            <a href="#"><i class="fa fa-shopping-cart"></i> 0 sản phẩm <i
                                    class="fa fa-angle-down"></i></a>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--header middel end-->
    <div class="header_bottom">
        <div class="row">
            <div class="col-12">
                <div class="main_menu_inner">
                    <div class="main_menu d-none d-lg-block">
                        <nav>
                            <ul>
                                <li class="active"><a href="{{ route('shop.home') }}">Trang chủ</a></li>
                                <li><a href="{{ route('shop.listAll', 'All') }}">Thương hiệu</a>
                                    <div class="mega_menu jewelry">
                                        <div class="mega_items jewelry">
                                            <ul>
                                                @foreach ($brands as $brand)
                                                    <li><a
                                                            href="{{ route('shop.listAll', $brand->brand) }}">{{ $brand->brand }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </li>

                                <li><a href="#">Tin tức</a></li>
                                <li><a href="#">Địa chỉ</a></li>

                                @if (Auth::user())
                                    <li><a href="{{ route('shop.cart') }}" title="My cart">Giỏ hàng</a></li>
                                    <li><a href="{{ route('shop.myAccount') }}">{{ Auth::user()->name }}</a></li>
                                @else
                                    <li><a href="{{ route('get.login') }}" title="Login">Đăng nhập</a></li>
                                @endif

                            </ul>
                        </nav>
                    </div>
                    <div class="mobile-menu d-lg-none">
                        <nav>
                            <ul>
                                <li class="active"><a href="{{ route('shop.home') }}">Trang chủ</a></li>
                                <li><a href="{{ route('shop.listAll', 'All') }}">Thương hiệu</a>
                                    <div class="mega_menu jewelry">
                                        <div class="mega_items jewelry">
                                            <ul>
                                                @foreach ($brands as $brand)
                                                    <li><a
                                                            href="{{ route('shop.listAll', $brand->brand) }}">{{ $brand->brand }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </li>

                                <li><a href="#">Tin tức</a></li>
                                <li><a href="#">Địa chỉ</a></li>

                                @if (Auth::user())
                                    <li><a href="#" title="My cart">Giỏ hàng</a></li>
                                    <li><a href="{{ route('shop.myAccount') }}">{{ Auth::user()->name }}</a></li>
                                @else
                                    <li><a href="{{ route('get.login') }}" title="Login">Đăng nhập</a></li>
                                @endif


                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--header end -->
