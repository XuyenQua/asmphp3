@extends('admin.master')

@section('title')
    Người dùng : {{ $user->ten_nguoi_dung }}
@endsection

@section('content')
    <div class="container">
        <div class="main-body p-3">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="$">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Người dùng: {{ $user->ten_nguoi_dung }}</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ Storage::url($user->hinh_anh) }}" alt="ảnh Người dùng" class="rounded-circle"
                                    width="200" height="200">
                                <div class="mt-3">
                                    <h4>{{ $user->ten_nguoi_dung }}</h4>
                                    <p>Id : {{ $user->id }}</p>
                                    {{-- <p class="text-secondary mb-1">Full Stack Developer</p>
                                    <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                                    <button class="btn btn-primary">Follow</button>
                                    <button class="btn btn-outline-primary">Message</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Tên Người dùng</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->ten_nguoi_dung }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">vai trò</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->ten_vai_tro }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->email }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">số điện thoại</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->so_dien_thoai }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">địa chỉ</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->dia_chi }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Ngày tạo</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->created_at }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Ngày cập nhật</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->updated_at }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    
                                    <a class="btn btn-secondary" href="{{ route('admin.user.index') }}">
                                        Danh sách
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                   
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
@endsection
