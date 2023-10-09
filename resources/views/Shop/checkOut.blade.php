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
                        <li>Thanh toán</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->


    <!--Checkout page section-->
    <div class="Checkout_section">
        <div class="checkout_form">
            <form action="{{ route('user.order') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <h3>Thông tin người nhận</h3>
                        <div class="row">
                            <div class="col-12">
                                @if ($errord = session()->get('errors'))
                                    <ul>
                                        @foreach ($errors->messages() as $key => $error)
                                            <li>
                                                <i style="color: red">{{ $error[0] }}</i>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-30">
                                <label>Tên người nhận <span>*</span></label>
                                <input type="text" name="name" value="{{ Auth::user()->name }}">
                            </div>
                            <div class="col-12 mb-30">
                                <label>Địa chỉ <span>*</span></label>
                                <input name="address" type="text" value="{{ Auth::user()->address }}">
                            </div>
                            <div class="col-lg-6 mb-30">
                                <label>Số điện thoại<span>*</span></label>
                                <input type="text" name="tel" value="{{ Auth::user()->tel }}">

                            </div>
                            <div class="col-lg-6 mb-30">
                                <label> Email <span>*</span></label>
                                <input type="text" name="email" value="{{ Auth::user()->email }}">
                            </div>
                            <div class="col-12">
                                <div class="order-notes">
                                    <label for="order_note">Ghi chú đơn hàng</label>
                                    <textarea id="order_note" style="height: 100px" name="note"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <h3>Your order</h3>
                        <div class="order_table table-responsive mb-30">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($products as $product)
                                        <input type="hidden" name="product[{{ $i }}][idProduct]"
                                            value="{{ $product['id'] }}">
                                        <input type="hidden" name="product[{{ $i }}][sol]"
                                            value="{{ $product['sol'] }}">
                                        <input type="hidden" name="product[{{ $i }}][size]"
                                            value="{{ $product['size'] }}">
                                        <input type="hidden" name="product[{{ $i }}][nameProduct]"
                                            value="{{ $product['name'] }}">
                                        <input type="hidden" name="sumPrice" value="{{ sumPrice() }}">
                                        <tr>
                                            <td> {{ $product['id'] }} ({{ $product['size'] }}) <strong> ×
                                                    {{ $product['sol'] }}</strong></td>
                                            <td> {{ number_format($product['price'] * $product['sol']) }}VND</td>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Phí vận chuyển</th>
                                        <td><strong>Miễn phí</strong></td>
                                    </tr>
                                    <tr class="order_total">
                                        <th style="font-size: 20px">Tổng tiền</th>
                                        <td style="font-size: 16px"><strong>{{ number_format(sumPrice()) }}VND</strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment_method">
                            {{-- <div class="panel-default">
                                <input id="payment" name="check_method" type="radio" data-target="createp_account">
                                <label for="payment" data-toggle="collapse" data-target="#method"
                                    aria-controls="method">Create an account?</label>

                                <div id="method" class="collapse one" data-parent="#accordion">
                                    <div class="card-body1">
                                        <p>Please send a check to Store Name, Store Street, Store Town, Store State /
                                            County, Store Postcode.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-default">
                                <input id="payment_defult" name="check_method" type="radio" data-target="createp_account">
                                <label for="payment_defult" data-toggle="collapse" data-target="#collapsedefult"
                                    aria-controls="collapsedefult">PayPal <img src="assets\img\visha\papyel.png"
                                        alt=""></label>

                                <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                    <div class="card-body1">
                                        <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                            account.</p>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="order_button">
                                <button type="submit">Đặt hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </form>
    <!--Checkout page section end-->
@endsection
