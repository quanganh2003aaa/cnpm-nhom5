@extends('Admin.master')
@section('contents')
<section class="section faq">
    <div class="row">
        <div class="col-lg-7">

            <div class="card basic">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Mã</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Số lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderProducts as $orderProduct)
                            <tr>
                                <th scope="row">{{ $orderProduct['idProduct'] }}</th>
                                <td>{{ $orderProduct['nameProduct'] }}</td>
                                <td>{{ $orderProduct['sol'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-lg-5">

            <!-- F.A.Q Group 2 -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <h5 class="card-title col-7" style="padding-left: 15px">ID: {{ $order->idOrder }}</h5>
                        <div class="col-5" style="padding: 17px 0px 0px;">
                            @if ($order->status == 'Đang xử lí')
                                <span class="badge bg-primary">{{ $order->status }}</span>
                            @elseif ($order->status == 'Đang giao')
                                <span class="badge bg-warning text-dark">{{ $order->status }}</span>
                            @elseif ($order->status == 'Giao hàng thành công')
                                <span class="badge bg-success">{{ $order->status }}</span>
                            @elseif ($order->status == 'Đã hủy')
                                <span class="badge bg-danger">{{ $order->status }}</span>
                            @endif
                            {{-- <span class="badge bg-primary">Primary</span> --}}
                        </div>

                    </div>

                    <div class="row" style="padding: inherit;">
                        <div class="col-lg-5 col-md-5 label ">Tên</div>
                        <div class="col-lg-7 col-md-7">{{ $order->name }}</div>
                    </div>
                    <div class="row" style="padding: inherit;">
                        <div class="col-lg-5 col-md-5 label ">Số điện thoại</div>
                        <div class="col-lg-7 col-md-7">{{ $order->tel }}</div>
                    </div>
                    <div class="row" style="padding: inherit;">
                        <div class="col-lg-5 col-md-5 label ">Địa chỉ</div>
                        <div class="col-lg-7 col-md-7">{{ $order->address }}</div>
                    </div>
                    <div class="row" style="padding: inherit;">
                        <div class="col-lg-5 col-md-5 label ">Note</div>
                        <div class="col-lg-7 col-md-7">{{ $order->note }}</div>
                    </div>

                </div>
            </div><!-- End F.A.Q Group 2 -->

            @if ($order->status == 'Đang xử lí')
                <!-- F.A.Q Group 3 -->
                <div class="card">
                    <form action="{{route('admin.comfirmOrder', $order)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-primary" type="submit" style="width: 100%">
                            Đơn hàng đã được chuyển đi
                        </button>
                    </form>
                </div><!-- End F.A.Q Group 3 -->
            @endif


        </div>

    </div>
</section>
@endsection
