@extends('admin.master')

@section('title')
    banner : {{ $ban->ten_banner }}
@endsection

@section('content')
    <div class="container">
        <div class="main-body p-3">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="$">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">banner: {{ $ban->ten_banner }}</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
            <div class="row gutters-sm">
               
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ Storage::url($ban->hinh_anh) }}" alt="ảnh banner" width="600">
                                <div class="mt-3">
                                    <h4>{{ $ban->ten_banner }}</h4>
                                    <p>Id : {{ $ban->id }}</p>
                                    {{-- <p class="text-secondary mb-1">Full Stack Developer</p>
                                    <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                                    <button class="btn btn-primary">Follow</button>
                                    <button class="btn btn-outline-primary">Message</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Tên Banner</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $ban->ten_banner }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Vị Trí</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                   @if ($ban->vi_tri == 'top')
                                       Trên
                                   @endif
                                   @if ($ban->vi_tri == 'middle')
                                       giữa
                                   @endif
                                   @if ($ban->vi_tri == 'buttom')
                                       dưới
                                   @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Ngày tạo</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $ban->created_at }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Ngày cập nhật</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $ban->updated_at }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info " href="{{ route('admin.banner.edit', $ban->id) }}">Sửa</a>
                                    <a class="btn btn-secondary" href="{{ route('admin.banner.index') }}">
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
