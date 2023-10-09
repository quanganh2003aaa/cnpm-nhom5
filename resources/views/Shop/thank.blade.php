@extends('Shop.master')
@section('content')
    <!--error section area start-->
    <div class="error_section">
        <div class="row">
            <div class="col-12">
                <div class="error_form">
                    <h1 style="font-size: 100px">Thank you</h1>
                    <h2>for your order</h2>
                    <p>Closet Collection đảm bảo về sự chính hãng và uy tín của sản phẩm. Nếu sản phẩm có vấn đề hãy liên hệ với chúng tôi để được hỗ trợ.</p>
                    <form action="{{ route('shop.search') }}" method="GET">
                        <input placeholder="Search..." type="text" name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <a href="{{route('shop.home')}}">Trang chủ</a>
                </div>
            </div>
        </div>
    </div>
    <!--error section area end-->
@endsection
