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
                        <li>Giỏ hàng</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--shopping cart area start -->
    <div class="shopping_cart_area">
        <form action="{{ route('user.checkOut') }}" id="addUserForm">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="cart_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product_remove"></th>
                                        <th class="product_thumb">Hình ảnh</th>
                                        <th class="product_name">Tên sản phẩm</th>
                                        <th class="product_total">Size</th>
                                        <th class="product-price">Đơn giá</th>
                                        <th class="product_quantity">Số lượng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (Auth::user()->cart)
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach (cartData() as $product)
                                            <input type="hidden" name="product[{{ $i }}][id]"
                                                value="{{ $product->idProduct }}" id="id[{{ $i }}]">
                                            <input type="hidden" name="product[{{ $i }}][name]"
                                                value="{{ $product->nameProduct }}">
                                            <input type="hidden" name="product[{{ $i }}][img]"
                                                value="{{ $product->imgProduct }}">
                                            <input type="hidden" name="product[{{ $i }}][size]"
                                                value="{{ $product->sizeProduct }}">
                                            <input type="hidden" name="product[{{ $i }}][price]"
                                                value="{{ $product->priceProduct }}">

                                            <tr style="border-right: 1px solid #e1e1e1;">
                                                <td class="product_remove"><a href="{{ route('shop.deleteCart', $i) }}"><i
                                                            class="fa fa-trash-o"></i></a>
                                                </td>
                                                <td class="product_thumb"><a
                                                        href="{{ route('shop.singleProduct', $product->idProduct) }}"><img
                                                            src="{{ asset($product->imgProduct) }}" alt=""
                                                            style="width: 150px"></a></td>
                                                <td class="product_name"><a
                                                        href="{{ route('shop.singleProduct', $product->idProduct) }}">{{ $product->nameProduct }}</a>
                                                </td>
                                                <td class="product_total">{{ $product->sizeProduct }}</td>
                                                <td class="product-price">{{ number_format($product->priceProduct) }}đ</td>

                                                <td class="product_quantity"><input min="0" max="100"
                                                        value="{{ $product->sol }}" type="number"
                                                        name="product[{{ $i }}][sol]"
                                                        id="sol[{{ $i }}]"></td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="cart_submit">
                            <button type="button" id="submit">Cập nhật giỏ hàng</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--coupon code area start-->
            <div class="coupon_area">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code">
                            <h3>Thanh toán</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal" style="height: 50px">
                                    <p style="width: 100%">Thành tiền:</p>
                                    <input type="text" class="Total1 cart_amount" id="price1" readonly
                                        style="border: 0" value="{{ number_format(sumPrice()) }}VND">
                                </div>
                                <div class="cart_subtotal ">
                                    <p>Phí vận chuyển: </p>
                                    <p class="cart_amount"><span style="margin: 0">Miễn phí vận chuyển</span></p>
                                </div>
                                <a href="#"></a>
                                <div class="cart_subtotal">
                                    <p>Tổng: </p>
                                    <input type="text" class="cart_amount Total" id="price-total" readonly
                                        style="border: 0" value="{{ number_format(sumPrice()) }}VND">
                                </div>
                                <div class="checkout_btn">
                                    {{-- <a href="#">Tiến hành thanh toán</a> --}}
                                    <button type="submit" style="background: #00bba6;font-size: 14px;">Tiến hành thanh
                                        toán</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--coupon code area end-->
        </form>
    </div>
    <!--shopping cart area end -->

    <script type="text/javascript">
        $("#submit").click(function(e) {

            e.preventDefault();

            function addPlus(nStr) {
                nStr += '';
                x = nStr.split('.');
                x1 = x[0];
                x2 = x.length > 1 ? '.' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1)) {
                    x1 = x1.replace(rgx, '$1' + ',' + '$2');
                }
                return x1 + x2;
            };

            $.ajax({
                url: "/shop/Cart/update/ddddd",
                method: "POST",
                data: $('#addUserForm').serialize(),
                success: function(result) {
                    // console.log();
                    var i = 0,
                        sum = 0;
                    result.forEach(element => {
                        console.log(result[i]['priceProduct'] * result[i]['sol']);
                        sum += result[i]['priceProduct'] * result[i]['sol'];
                        i++;
                    });
                    $("#price-total").val(addPlus(sum) + "VND");
                    $("#price1").val(addPlus(sum) + "VND");
                    console.log(sum);
                }
            });
        });
    </script>
@endsection
