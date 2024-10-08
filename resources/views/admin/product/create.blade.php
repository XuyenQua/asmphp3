@extends('admin.master')


@section('title')
    Thêm mới sản phẩm
@endsection

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Thêm mới sản phẩm</h3>
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
                        <a href="#">sản phẩm</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Thêm mới sản phẩm</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Thêm mới sản phẩm
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-6">
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-3 col-form-label">Tên sản phẩm</label>
                                            <div class="col-md-9 p-0">
                                                <input type="text" class="form-control input-full" placeholder=""
                                                    name="ten_san_pham" />
                                            </div>
                                            @error('ten_san_pham')
                                                <br>
                                                <div class="alert alert-danger col-md-9">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-9">
                                            <label for="danh_muc">Danh mục</label>
                                            <select class="form-select " aria-label="Default select example" name="danh_muc_id">
                                                <option value=""></option>
                                                @foreach ($listCate as $item)
                                                    <option value="{{ $item->id }}">{{ $item->ten_danh_muc }}</option>
                                                @endforeach
                                            </select>
                                            @error('danh_muc_id')
                                                <br>
                                                <div class="alert alert-danger col-md-9">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-3 col-form-label">Giá </label>
                                            <div class="col-md-9 p-0">
                                                <input type="text" class="form-control input-full" placeholder=""
                                                    name="gia" />
                                            </div>
                                            @error('gia')
                                                <br>
                                                <div class="alert alert-danger col-md-9">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-3 col-form-label">Số lượng</label>
                                            <div class="col-md-9 p-0">
                                                <input type="text" class="form-control input-full" placeholder=""
                                                    name="so_luong" />
                                            </div>
                                            @error('so_luong')
                                                <br>
                                                <div class="alert alert-danger col-md-9">{{ $message }}</div>
                                            @enderror
                                        </div>


                                    </div>
                                    <div class="col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Chọn ảnh</label><br>
                                            <input type="file" class="form-control-file" name="hinh_anh" />
                                            @error('hinh_anh')
                                                <br>
                                                <div class="alert alert-danger col-md-9">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-9">
                                            <label for="comment">Mô tả ngắn</label>
                                            <textarea class="form-control" name="mo_ta_ngan" rows="3"></textarea>
                                            @error('mo_ta_ngan')
                                                <br>
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-9">
                                            <label for="comment">Chi tiết sản phẩm</label>
                                            <textarea class="form-control" name="chi_tiet_san_pham" rows="5"></textarea>
                                            @error('chi_tiet_san_pham')
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
                                <a class="btn btn-secondary" href="{{ route('admin.product.index') }}">
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
    @if (session('success'))
        <script>
            Swal.fire({
                title: "Thành Công",
                text: "Thêm mới thành công",
                icon: "success"
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: "thất bại",
                text: "Thêm mới thất bại",
                icon: "error"
            });
        </script>
    @endif
@endsection
