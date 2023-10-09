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
                        <li>{{ Auth::user()->name }}</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!-- Start Maincontent  -->
    <section class="main_content_area">
        <div class="account_dashboard">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <!-- Nav tabs -->
                    <div class="dashboard_tab_button">
                        <ul role="tablist" class="nav flex-column dashboard-list">
                            <li><a href="#account-details" data-toggle="tab" class="nav-link active">Thông tin tài khoản</a>
                            </li>
                            <li> <a href="#orders" data-toggle="tab" class="nav-link">Giỏ hàng</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <a href="#" class="nav-link">
                                        <button type="submit" class="logout2">
                                            Đăng xuất
                                        </button>
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content">
                        <div class="tab-pane fade show active" id="account-details">
                            <h3>Thông tin chi tiết tài khoản </h3>
                            <div class="login">
                                <div class="login_form_container">
                                    <div class="account_login_form">
                                        <form action="{{ route('user.update') }}" method="POST">
                                            @csrf
                                            <label>Tên người dùng</label>
                                            <input type="text" name="name" value="{{ Auth::user()->name }}">
                                            <label>Email</label>
                                            <input type="text" name="email" value="{{ Auth::user()->email }}">
                                            <label>Số điện thoại</label>
                                            <input type="text" name="tel" value="{{ Auth::user()->tel }}">
                                            <label>Địa chỉ</label>
                                            <input type="text" name="address" value="{{ Auth::user()->address }}">
                                            {{-- <div class="save_button primary_btn default_button">
                                                <a href="#">Save</a>
                                            </div> --}}
                                            <button type="submit" class="updateUser">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="orders">
                            <h3>Đơn hàng</h3>
                            <div class="coron_table table-responsive">
                                <table class="table">
                                    <thead style="text-align: center">
                                        <tr>
                                            <th>STT</th>
                                            <th>ID</th>
                                            <th>Sản phẩm</th>
                                            <th>Thành tiền</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $order->idOrder }}</td>
                                                <td>
                                                    @foreach ($order->product as $product)
                                                        <a href="{{ route('shop.singleProduct', $product->idProduct) }}">{{ $product->sol }}
                                                            x {{ $product->idProduct }} -- size: {{ $product->size }}</a>
                                                        <br>
                                                    @endforeach
                                                </td>
                                                <td>{{ number_format($order->sumPrice) }}đ</td>
                                                <td>
                                                    @if ($order->status == 'Đang xử lí')
                                                    <span
                                                        style="background-color: #0d6efd; color: #fff; padding: 4px; border-radius: 5px; font-size: 13px;">{{ $order->status }}</span>
                                                @elseif($order->status == 'Đang giao')
                                                    <span
                                                        style="background-color: #ffc107; color: #fff; padding: 4px; border-radius: 5px; font-size: 13px;">{{ $order->status }}</span>
                                                @elseif($order->status == 'Giao hàng thành công')
                                                    <span
                                                        style="background-color: #198754; color: #fff; padding: 4px; border-radius: 5px; font-size: 10px;">{{ $order->status }}</span>
                                                @elseif($order->status == 'Đã hủy')
                                                    <span
                                                        style="background-color: #dc3545; color: #fff; padding: 4px; border-radius: 5px; font-size: 13px;">{{ $order->status }}</span>
                                                @endif
                                                </td>
                                                @if ($order->status == 'Đang xử lí')
                                                    <td style="">
                                                        <form action="{{ route('admin.deleteOrder', $order) }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <button class="btn btn-danger" type="submit" style="border-radius: 5px">
                                                                Hủy đơn hàng
                                                            </button>
                                                        </form>
                                                    </td>
                                                @elseif ($order->status == 'Đang giao')
                                                    <td style="">
                                                        <form action="{{ route('admin.completeOrder', $order) }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <button class="btn btn-success" type="submit"
                                                                style="background-color: #198754; border-radius: 5px">
                                                                Đã nhận được hàng
                                                            </button>
                                                        </form>
                                                    </td>
                                                @else
                                                    <td style="padding-top: 44px;">
                                                    </td>
                                                @endif
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Maincontent  -->
@endsection
