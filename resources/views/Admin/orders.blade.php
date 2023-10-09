@extends('Admin.master')
@section('contents')
    <div class="pagetitle">
        <h1>Quản lí đơn hàng</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                <li class="breadcrumb-item active">Quản lí đơn hàng</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Danh sách đơn hàng</h5>

            <!-- Table with stripped rows -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Ngày đặt</th>
                        <th scope="col">Tình trạng</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <th scope="row">{{$order->idOrder}}</th>
                            <td>{{number_format($order->sumPrice)}} VND</td>
                            <td>{{$order->created_at}}</td>
                            <td>
                                @if ($order->status == 'Đang xử lí')
                                    <span class="badge bg-primary">{{$order->status}}</span>
                                @elseif ($order->status == 'Đang giao')
                                    <span class="badge bg-warning text-dark">{{$order->status}}</span>
                                @elseif ($order->status == 'Giao hàng thành công')
                                    <span class="badge bg-success">{{$order->status}}</span>
                                @elseif ($order->status == 'Đã hủy')
                                    <span class="badge bg-danger">{{$order->status}}</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm">
                                    <a href="{{route('admin.orderSingleAdmin', $order)}}" style="color: #fff">Xem chi tiết</a>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End Table with stripped rows -->
            {{ $orders->links() }}
        </div>
    </div>
@endsection
