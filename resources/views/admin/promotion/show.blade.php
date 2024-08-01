@extends('admin.master')

@section('title')
    khuyến mãi : {{ $prom->ten_khuyen_mai }}
@endsection

@section('content')
    <div class="container">
        <div class="main-body p-3">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="$">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">khuyến mãi: {{ $prom->ten_khuyen_mai }}</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <div class="mt-3">
                                    <h4>{{ $prom->ten_khuyen_mai }}</h4>
                                    <p>Id : {{ $prom->id }}</p>
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
                                    <h6 class="mb-0">Tên Khuyến mãi</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $prom->ten_khuyen_mai }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Mã khuyễn mãi</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $prom->ma_khuyen_mai }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Loại khuyễn mãi</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    @if ($prom->loai_khuyen_mai == 'gia_tri')
                                        Giá trị
                                    @endif
                                    @if ($prom->loai_khuyen_mai == 'phan_tram')
                                        Phần trăm
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Giá trị</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    @if ($prom->loai_khuyen_mai == 'gia_tri')
                                        {{ number_format($prom->gia_tri, 0, ',', '.') }} VNĐ
                                    @endif
                                    @if ($prom->loai_khuyen_mai == 'phan_tram')
                                        {{ $prom->gia_tri }} %
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Số lượng</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $prom->so_luong }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Ngày bắt đầu</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $prom->ngay_bat_dau }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Ngày kết thúc</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $prom->ngay_ket_thuc }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Trạng thái</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $prom->ten_trang_thai }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Ngày tạo</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $prom->created_at }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Ngày cập nhật</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $prom->updated_at }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info "
                                        href="{{ route('admin.promotion.edit', ['id' => $prom->id]) }}">Sửa</a>
                                    <a class="btn btn-secondary" href="{{ route('admin.promotion.index') }}">
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
