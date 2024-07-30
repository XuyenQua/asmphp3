@extends('admin.master')

@section('title')
    Danh mục : {{ $Cate->ten_danh_muc }}
@endsection

@section('content')
    <div class="container">
        <div class="main-body p-3">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="$">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Danh mục: {{ $Cate->ten_danh_muc }}</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ Storage::url($Cate->hinh_anh) }}" alt="ảnh danh mục" class="rounded-circle"
                                    width="200" height="200">
                                <div class="mt-3">
                                    <h4>{{ $Cate->ten_danh_muc }}</h4>
                                    <p>Id : {{ $Cate->id }}</p>
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
                                    <h6 class="mb-0">Tên danh mục</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $Cate->ten_danh_muc }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Mô tả</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $Cate->mo_ta }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Ngày tạo</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $Cate->created_at }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Ngày cập nhật</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $Cate->updated_at }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info " href="{{ route('admin.category.edit', $Cate->id) }}">Sửa</a>
                                    <a class="btn btn-secondary" href="{{ route('admin.category.index') }}">
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
