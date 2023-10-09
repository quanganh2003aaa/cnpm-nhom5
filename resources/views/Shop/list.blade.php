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
                        <li>{{ $brand }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--pos home section-->
    <div class=" pos_home_section">
        <div class="row pos_home">
            <div class="col-lg-3 col-md-12">
                <!--layere categorie"-->
                <div class="sidebar_widget shop_c">
                    <div class="categorie__titile">
                        <h4>Categories</h4>
                    </div>
                    <div class="layere_categorie">
                        <ul>
                            @foreach ($categories as $category)
                            <li>
                                <input id="acces" type="checkbox">
                                <label for="acces">{{$category->brand}}</label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!--layere categorie end-->

                <!--price slider start-->
                <div class="sidebar_widget price">
                    <h2>Khoảng giá</h2>
                    <div class="ca_search_filters">

                        <input type="text" name="text" id="amount">
                        <div id="slider-range"></div>
                    </div>
                </div>
                <!--price slider end-->

                <!--newsletter block start-->
                <div class="sidebar_widget newsletter mb-30">
                    <div class="block_title">
                        <h3>newsletter</h3>
                    </div>
                    <form action="#">
                        <p>Sign up for your newsletter</p>
                        <input placeholder="Your email address" type="text">
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
                <!--newsletter block end-->

                <!--special product start-->
                <div class="sidebar_widget special">
                    <div class="block_title">
                        <h3>Sản phẩm đặc biệt</h3>
                    </div>
                    @foreach ($specials as $special)
                    <div class="special_product_inner mb-20">
                        <div class="special_p_thumb">
                            <a href="{{ route('shop.singleProduct', $special->idProduct) }}"><img
                                src="{{asset($special->imgProduct)  }}" alt="" style="width: 60px"></a>
                        </div>
                        <div class="small_p_desc">
                            <div class="product_ratting">
                                <ul>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                </ul>
                            </div>
                            <h3><a href="{{ route('shop.singleProduct', $special->idProduct) }}">{{ $special->idProduct }}</a></h3>
                            <div class="special_product_proce">
                                <span class="new_price">{{ number_format($special->priceProduct) }}đ</span>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <!--special product end-->


            </div>
            <div class="col-lg-9 col-md-12">
                <!--banner slider start-->
                <div class="banner_slider mb-35">
                    <img src="{{ asset('assets\img\banner\bannner10.jpg') }}" alt="">
                </div>
                <!--banner slider start-->

                <!--shop toolbar start-->
                <div class="shop_toolbar mb-35">

                    <div class="list_button">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#large" role="tab" aria-controls="large"
                                    aria-selected="true"><i class="fa fa-th-large"></i></a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#list" role="tab" aria-controls="list"
                                    aria-selected="false"><i class="fa fa-th-list"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="page_amount">
                        <p>Showing 1–9 of {{count($products)}} results</p>
                    </div>

                    <div class="select_option">
                        <form action="#">
                            <label>Sort By</label>
                            <select name="orderby" id="short">
                                <option selected="" value="1">Position</option>
                                <option value="1">Price: Lowest</option>
                                <option value="1">Price: Highest</option>
                                <option value="1">Product Name:Z</option>
                                <option value="1">Sort by price:low</option>
                                <option value="1">Product Name: Z</option>
                                <option value="1">In stock</option>
                                <option value="1">Product Name: A</option>
                                <option value="1">In stock</option>
                            </select>
                        </form>
                    </div>
                </div>
                <!--shop toolbar end-->

                <!--shop tab product-->
                <div class="shop_tab_product">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="large" role="tabpanel">
                            <div class="row">
                                @foreach ($products as $product)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a href="{{ route('shop.singleProduct', $product->idProduct) }}"><img
                                                        src="{{ asset($product->imgProduct) }}" alt=""></a>
                                                <div class="img_icone">
                                                    <img src="assets\img\cart\span-new.png" alt="">
                                                </div>
                                                <div class="product_action">
                                                    <a href="{{ route('user.addCart', ['idProduct' => $product->idProduct]) }}"> <i class="fa fa-shopping-cart"></i> Thêm vào giỏ
                                                        hàng</a>
                                                </div>
                                            </div>
                                            <div class="product_content">
                                                <span
                                                    class="product_price">{{ number_format($product->priceProduct) }}đ</span>
                                                <h3 class="product_title"><a
                                                        href="{{ route('shop.singleProduct', $product->idProduct) }}">{{ $product->nameProduct }}</a>
                                                </h3>
                                            </div>
                                            <div class="product_info">
                                                <ul>
                                                    <li><a href="#" title=" Add to Wishlist ">Yêu thích</a></li>
                                                    <li><a href="#" data-toggle="modal" data-target="#modal_box"
                                                            title="Quick view">Xem chi tiết</a></li>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="tab-pane fade" id="list" role="tabpanel">
                            @foreach ($products as $product)
                                <div class="product_list_item mb-35">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="product_thumb">
                                                <a href="{{ route('shop.singleProduct', $product->idProduct) }}"><img
                                                        src="{{ asset($product->imgProduct) }}" alt=""></a>
                                                <div class="hot_img">
                                                    <img src="assets\img\cart\span-hot.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-6 col-sm-6">
                                            <div class="list_product_content">
                                                <div class="product_ratting">
                                                    <ul>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="list_title">
                                                    <h3><a
                                                            href="{{ route('shop.singleProduct', $product->idProduct) }}">{{ $product->nameProduct }}</a>
                                                    </h3>
                                                </div>
                                                <p class="design"> in quibusdam accusantium qui nostrum consequuntur,
                                                    officia,
                                                    quidem ut placeat. Officiis, incidunt eos recusandae! Facilis aliquam
                                                    vitae
                                                    blanditiis quae perferendis minus eligendi</p>
                                                <div class="content_price">
                                                    <span>{{ number_format($product->priceProduct) }}đ</span>
                                                </div>
                                                <div class="add_links">
                                                    <ul>
                                                        <li><a href="{{ route('user.addCart', ['idProduct' => $product->idProduct]) }}" title="add to cart"><i
                                                                    class="fa fa-shopping-cart"
                                                                    aria-hidden="true"></i></a>
                                                        </li>
                                                        <li><a href="#" title="add to wishlist"><i
                                                                    class="fa fa-heart" aria-hidden="true"></i></a></li>
                                                        <li><a href="#" data-toggle="modal"
                                                                data-target="#modal_box" title="Quick view"><i
                                                                    class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!--shop tab product end-->

                <!--pagination style start-->
                <div class="pagination_style" style="border: 0; justify-content: flex-end;">
                    {{$products->links()}}
                </div>
                <!--pagination style end-->
            </div>
        </div>
    </div>
    <!--pos home section end-->
@endsection
