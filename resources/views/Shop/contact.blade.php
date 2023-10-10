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
                        <li>Địa chỉ</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--contact area start-->
    <div class="contact_area">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="contact_message">
                    <h3>Gửi câu hỏi</h3>
                    <form id="contact-form" method="POST" action="assets/mail.php">
                        <div class="row">
                            <div class="col-lg-6">
                                <input name="email" placeholder="Email *" type="email" value="{{Auth::user()->email}}">
                            </div>
                            <div class="col-lg-6">
                                <input name="phone" placeholder="Phone *" type="text" value="{{Auth::user()->tel}}">
                            </div>

                            <div class="col-12">
                                <div class="contact_textarea">
                                    <textarea placeholder="Message *" name="message" class="form-control2"></textarea>
                                </div>
                                <button type="submit"> Gửi </button>
                            </div>
                            <div class="col-12">
                                <p class="form-messege">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="contact_message contact_info">
                    <h3>Về chúng tôi</h3>
                    <p> Closet Collection chúng tôi xin đảm bảo về chất lượng sản phẩm chính hãng 100%.
                        Nếu có vấn đề rì về sản phẩm xin hãy liên hệ với chúng tôi để có thể nhận hỗ trợ.
                    </p>
                    <ul>
                        <li><i class="fa fa-fax"></i> Địa chỉ : Phường Văn Quán, Hà Đông, Hà Nội</li>
                        <li><i class="fa fa-phone"></i> <a href="#">ClosetColletion@gmail.com</a></li>
                        <li><i class="fa fa-envelope-o"></i> (+84) 123 456 789</li>
                    </ul>
                    <h3><strong>Giờ làm việc</strong></h3>
                    <p><strong>T2 – CN</strong>: 08AM – 22PM</p>
                </div>
            </div>
        </div>
    </div>

    <!--contact area end-->

    <!--contact map start-->
    <div class="contact_map">
        <div class="row">
            <div class="col-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.3012675708383!2d105.78657997509173!3d20.980557380656816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ade83ba9e115%3A0x6f4fdb5e1e9e39ed!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBLaeG6v24gdHLDumMgSMOgIE7hu5lp!5e0!3m2!1svi!2s!4v1696932264027!5m2!1svi!2s"
                width="500" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <!--contact map end-->
@endsection
