@extends('admin.master')


@section('title')
    Thêm mới banner
@endsection

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Thêm mới banner</h3>
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
                        <a href="#">banner</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Thêm mới banner</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Thêm mới banner
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-6">
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-3 col-form-label">Tên banner</label>
                                            <div class="col-md-9 p-0">
                                                <input type="text" class="form-control input-full" placeholder=""
                                                    name="ten_banner" />
                                            </div>
                                            @error('ten_banner')
                                                <br>
                                                <div class="alert alert-danger col-md-9">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Chọn ảnh</label>
                                            <input type="file" class="form-control-file" name="hinh_anh" />
                                            @error('hinh_anh')
                                                <br>
                                                <div class="alert alert-danger col-md-9">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-3 col-form-label">vị trí</label>
                                            <div class="col-md-9 p-0">
                                                <select class="form-select" aria-label="Default select example" name="vi_tri">
                                                    <option value=""></option>
                                                    <option value="top">trên</option>
                                                    <option value="middle">giữa</option>
                                                    <option value="bottom">dưới</option>
                                                </select>
                                            </div>
                                            @error('vi_tri')
                                                <br>
                                                <div class="alert alert-danger col-md-9">{{ $message }}</div>
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
                                <a class="btn btn-secondary" href="{{ route('admin.banner.index') }}">
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
