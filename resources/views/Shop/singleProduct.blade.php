@extends('Shop.master')
@section('content')
    <div class="breadcrumbs_area">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.html">Trang chủ</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>{{ $product->nameProduct }}</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--product wrapper start-->
    <div class="product_details">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="product_tab fix">
                    <div class="product_tab_button">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#p_tab1" role="tab" aria-controls="p_tab1"
                                    aria-selected="false"><img src="{{ asset($product->imgProduct) }}" alt=""></a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content produc_tab_c">
                        <div class="tab-pane fade show active" id="p_tab1" role="tabpanel">
                            <div class="modal_img">
                                <a href="#"><img src="{{ asset($product->imgProduct) }}" alt=""></a>
                                <div class="img_icone">
                                    <img src="assets\img\cart\span-new.png" alt="">
                                </div>
                                <div class="view_img">
                                    <a class="large_view" href="{{ asset($product->imgProduct) }}"><i
                                            class="fa fa-search-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="product_d_right">
                    <h1>{{ $product->nameProduct }}</h1>
                    <div class="product_ratting mb-10">
                        <ul>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"> Write a review </a></li>
                        </ul>
                    </div>
                    <div class="product_desc">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati modi culpa voluptates illo,
                            quos magni totam inventore delectus perspiciatis necessitatibus, iure rerum! Deleniti nobis
                            voluptatibus minus, iusto ullam quae esse..</p>
                    </div>

                    <div class="content_price mb-15">
                        <span>{{ number_format($product->priceProduct) }} đ</span>
                        {{-- <span class="old-price">$130.00</span> --}}
                    </div>
                    <form action="{{route('user.addCart')}}">
                        @csrf
                        <input type="hidden" name="idProduct" value="{{$product->idProduct}}">
                        <div class="box_quantity mb-20">
                            <label>số lượng</label>
                            <input min="0" max="100" value="1" type="number" name="sol">

                            <button type="submit"><i class="fa fa-shopping-cart"></i> add to cart</button>
                            <a href="#" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a>
                        </div>
                        <div class="product_d_size mb-20">
                            <label for="group_1">size</label>
                            <select name="size" id="group_1">
                                @foreach ($product->sizeProduct as $size)
                                    <option value="{{ $size }}">{{ $size }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>

                    <div class="product_stock mb-20">
                        <p>{{ $product->quantityProduct }} items</p>
                        <span> In stock </span>
                    </div>
                    <div class="wishlist-share">
                        <h4>Share on:</h4>
                        <ul>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                            <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--product details end-->

    <!--product info start-->
    <div class="product_d_info">
        <div class="row">
            <div class="col-12">
                <div class="product_d_inner">
                    <div class="product_info_button">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info"
                                    aria-selected="false">More info</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet"
                                    aria-selected="false">Data sheet</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                    aria-selected="false">Reviews</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <div class="product_info_content">
                                <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine
                                    designs delivering stylish separates and statement dresses which have since evolved into
                                    a full ready-to-wear collection in which every item is a vital part of a woman's
                                    wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable
                                    signature style. All the beautiful pieces are made in Italy and manufactured with the
                                    greatest attention. Now Fashion extends to a range of accessories including shoes, hats,
                                    belts and more!</p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="sheet" role="tabpanel">
                            <div class="product_d_table">
                                <form action="#">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="first_child">Compositions</td>
                                                <td>Polyester</td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Styles</td>
                                                <td>Girly</td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Properties</td>
                                                <td>Short Dress</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                            <div class="product_info_content">
                                <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine
                                    designs delivering stylish separates and statement dresses which have since evolved into
                                    a full ready-to-wear collection in which every item is a vital part of a woman's
                                    wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable
                                    signature style. All the beautiful pieces are made in Italy and manufactured with the
                                    greatest attention. Now Fashion extends to a range of accessories including shoes, hats,
                                    belts and more!</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <div class="product_info_content">
                                <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine
                                    designs delivering stylish separates and statement dresses which have since evolved into
                                    a full ready-to-wear collection in which every item is a vital part of a woman's
                                    wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable
                                    signature style. All the beautiful pieces are made in Italy and manufactured with the
                                    greatest attention. Now Fashion extends to a range of accessories including shoes, hats,
                                    belts and more!</p>
                            </div>
                            <div class="product_info_inner">
                                <div class="product_ratting mb-10">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                    <strong>Posthemes</strong>
                                    <p>09/07/2018</p>
                                </div>
                                <div class="product_demo">
                                    <strong>demo</strong>
                                    <p>That's OK!</p>
                                </div>
                            </div>
                            <div class="product_review_form">
                                <form action="#">
                                    <h2>Add a review </h2>
                                    <p>Your email address will not be published. Required fields are marked </p>
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="review_comment">Your review </label>
                                            <textarea name="comment" id="review_comment"></textarea>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <label for="author">Name</label>
                                            <input id="author" type="text">

                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <label for="email">Email </label>
                                            <input id="email" type="text">
                                        </div>
                                    </div>
                                    <button type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product info end-->


    <!--new product area start-->
    <div class="new_product_area product_page">
        <div class="row">
            <div class="col-12">
                <div class="block_title">
                    <h3>Sản phẩm liên quan</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="single_p_active owl-carousel">
                @foreach ($product2s as $product2)
                    <div class="col-lg-3">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a href="{{ route('shop.singleProduct', $product2->idProduct) }}"><img src="{{asset($product2->imgProduct)}}"
                                        alt=""></a>
                                <div class="img_icone">
                                    <img src="assets\img\cart\span-new.png" alt="">
                                </div>
                                <div class="product_action">
                                    <a href="{{ route('user.addCart', ['idProduct' => $product2->idProduct]) }}"> <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <span class="product_price">{{ number_format($product2->priceProduct) }}đ</span>
                                <h3 class="product_title"><a href="{{ route('shop.singleProduct', $product2->idProduct) }}">{{ $product2->nameProduct }}</a></h3>
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
    </div>
    <!--new product area start-->
@endsection
