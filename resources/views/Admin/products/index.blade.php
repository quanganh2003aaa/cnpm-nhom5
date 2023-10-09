@extends('Admin.master')
@section('contents')
    <div class="pagetitle">
        <h1>Danh sách sản phẩm</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang chủ</a></li>
                <li class="breadcrumb-item">Quản lí sản phẩm</li>
                <li class="breadcrumb-item active">Danh sách sản phẩm</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="card">
        <div class="card-body">
            <div class="d-flex " style="height: 65px">
                <div class="p-2 flex-grow-1">
                    {{-- <h5 class="card-title">Danh sách sản phẩm</h5> --}}
                </div>
                <div class="p-2" style="margin-top: 5px">
                    <a href="{{route('admin.product.create')}}"><button type="button" class="btn btn-primary">+</button></a>
                </div>
            </div>
            <!-- Default Table -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Mã</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Số lượng
                            {{-- @if (isset($_GET['sol']))
                                <a class="bi bi-caret-down" href="{{ route('admin.product.index') }}">
                            @else
                                <form action="{{route('sol')}}" style="float: right;" method="GET">
                                    <input type="hidden" name="sol" value="1">
                                    <button type="submit" class="bi bi-caret-up" style="background-color: #fff; border: none;"></button>
                                </form>
                            @endif --}}
                        </th>
                        <th scope="col">Giá</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $product->idProduct }}</th>
                            <td>{{ $product->nameProduct }}</td>
                            <td>
                                <img src="{{ asset($product->imgProduct) }}" alt="" style="width: 100px">
                            </td>
                            <td>{{ $product->quantityProduct }}</td>
                            <td>{{ number_format($product->priceProduct) }}đ</td>
                            <td>
                                <div class="row">
                                    <div class="col-4">
                                        <a href="{{route('admin.product.edit', $product)}}" class="btn btn-warning">
                                            <i class="fa fa-pencil"></i>
                                            Sửa
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <form action="{{route('admin.product.delete', $product)}}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                                Xóa
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
    </div>
@endsection
