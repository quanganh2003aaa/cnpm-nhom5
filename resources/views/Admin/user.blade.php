@extends('Admin.master')
@section('contents')
    <div class="pagetitle">
        <h1>Quản lí tài khoản</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                <li class="breadcrumb-item active">Quản lí tài khoản</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="card">
        <div class="card-body">
            {{-- <div class="d-flex " style="height: 65px">
                <div class="p-2 flex-grow-1">
                </div>
                <div class="p-2" style="margin-top: 5px">
                    <a href="{{route('admin.product.create')}}"><button type="button" class="btn btn-primary">+</button></a>
                </div>
            </div> --}}
            <!-- Default Table -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        {{-- <th scope="col">Mã</th> --}}
                        <th scope="col">Tên người dùng</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            {{-- <th scope="row">{{ $product->id }}</th> --}}
                            <td>{{ $user->name }}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if ($user->role == "1")
                                    <span class="badge bg-success">Khách hàng</span>
                                @else
                                    <span class="badge bg-primary">Admin</span>
                                @endif
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-6">
                                        <form action="{{route('admin.users.update', $user)}}" method="POST">
                                            @csrf
                                            <button class="btn btn-warning">
                                                <i class="fa fa-pencil"></i>
                                                Thay đổi quyền
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-4">
                                        <form action="{{route('admin.users.delete', $user)}}" method="POST">
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
            {{-- {{ $products->links() }} --}}
        </div>
    </div>
@endsection
