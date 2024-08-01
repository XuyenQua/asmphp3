@extends('admin.master')


@section('title')
    sửa khuyến mãi {{ $prom->ten_khuyen_mai }}
@endsection

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">sửa khuyến mãi</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">khuyến mãi</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">sửa khuyến mãi {{ $prom->ten_khuyen_mai }}</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('admin.promotion.update',['id'=> $prom->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    sửa khuyến mãi: {{ $prom->ten_khuyen_mai }}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-6">
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-3 col-form-label">Tên Khuyến mãi</label>
                                            <div class="col-md-9 p-0">
                                                <input type="text" class="form-control input-full" placeholder=""
                                                    name="ten_khuyen_mai" value="{{ $prom->ten_khuyen_mai }}" />
                                            </div>
                                            @error('ten_khuyen_mai')
                                                <br>
                                                <div class="alert alert-danger col-md-9">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-3 col-form-label">Mã Khuyến mãi</label>
                                            <div class="col-md-9 p-0">
                                                <input type="text" class="form-control input-full"
                                                    placeholder="VD : MA12" name="ma_khuyen_mai"
                                                    value="{{ $prom->ma_khuyen_mai }}" />
                                            </div>
                                            @error('ma_khuyen_mai')
                                                <br>
                                                <div class="alert alert-danger col-md-9">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-3 col-form-label">Loại Khuyến mãi</label>
                                            <div class="col-md-9 p-0">
                                                <select class="form-select" name="loai_khuyen_mai"
                                                    aria-label="Default select example">
                                                    <option value="gia_tri" @if ($prom->loai_khuyen_mai == 'gia_tri') selected @endif>Giá trị</option>
                                                    <option value="phan_tram" @if ($prom->loai_khuyen_mai == 'phan_tram') selected @endif>Phần trăm</option>
                                                </select>

                                            </div>
                                            @error('loai_khuyen_mai')
                                                <br>
                                                <div class="alert alert-danger col-md-9">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-3 col-form-label">Giá Trị</label>
                                            <div class="col-md-9 p-0">
                                                <input type="number" class="form-control input-full" placeholder="VD : 12"
                                                    name="gia_tri" value="{{ $prom->gia_tri }}" />
                                                <small id="emailHelp" class="form-text text-muted">
                                                    Khi chọn loại khuyến mãi là giá trị có thể nhập số trên 100.
                                                </small><br>
                                                <small id="emailHelp" class="form-text text-muted">
                                                    khi chọn loại khuyến mãi là phần trăm nhập số trong khoảng 1 đến
                                                    100
                                                </small>
                                            </div>
                                            @error('gia_tri')
                                                <br>
                                                <div class="alert alert-danger col-md-9">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6">
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-3 col-form-label">Số lượng</label>
                                            <div class="col-md-9 p-0">
                                                <input type="number" class="form-control input-full" placeholder="VD : 12"
                                                    name="so_luong"  value="{{ $prom->so_luong }}"/>
                                            </div>
                                            @error('so_luong')
                                                <br>
                                                <div class="alert alert-danger col-md-9">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-3 col-form-label">Ngày bắt đầu</label>
                                            <div class="col-md-9 p-0">
                                                <input type="date" class="form-control input-full" id="ngay_bat_dau"
                                                    placeholder="VD : 12" name="ngay_bat_dau" value="{{ $prom->ngay_bat_dau }}"/>
                                            </div>
                                            @error('ngay_bat_dau')
                                                <br>
                                                <div class="alert alert-danger col-md-9">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-3 col-form-label">Ngày kêt thúc</label>
                                            <div class="col-md-9 p-0">
                                                <input type="date" class="form-control input-full" id="ngay_ket_thuc"
                                                    placeholder="VD : 12" name="ngay_ket_thuc" value="{{ $prom->ngay_ket_thuc }}"/>
                                            </div>
                                            @error('ngay_ket_thuc')
                                                <br>
                                                <div class="alert alert-danger col-md-9">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-9">
                                            <label for="comment">Mô tả</label>
                                            <textarea class="form-control" name="mo_ta" rows="5">{{ $prom->mo_ta }}</textarea>
                                            @error('mo_ta')
                                                <br>
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-action">
                                {{-- <input type="submit" class="btn btn-success" value="Submit"> --}}
                                <button type="submit" class="btn btn-success">
                                    Submit
                                </button>
                                <button class="btn btn-danger" type="button">
                                    Cancel
                                </button>
                                <a class="btn btn-secondary" href="{{ route('admin.promotion.index') }}">
                                    Danh sách
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).on('click', '.btn-success', function(e) {
            e.preventDefault();
            var form = $(this).parents('form');
            Swal.fire({
                title: 'Bạn có chắc muốn thay đổi?',
                text: "Hành động này không thể khôi phục!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Vâng'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();

                }
            })
        });
    </script>
    @if (session('success'))
        <script>
            Swal.fire({
                title: "Thành Công",
                text: "sửa thành công",
                icon: "success"
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: "thất bại",
                text: "sửa thất bại",
                icon: "error"
            });
        </script>
    @endif
@endsection
