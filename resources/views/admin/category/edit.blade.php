@extends('admin.master')


@section('title')
    Sửa danh mục : {{ $Cate->ten_danh_muc }}
@endsection

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">sửa danh mục : {{ $Cate->ten_danh_muc }}</h3>
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
                        <a href="#">Danh mục</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Sửa danh mục {{ $Cate->ten_danh_muc }}</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('admin.category.update', ['id' => $Cate->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Sửa danh mục : {{ $Cate->ten_danh_muc }}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-6">
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-3 col-form-label">Tên danh mục</label>
                                            <div class="col-md-9 p-0">
                                                <input type="text" class="form-control input-full" placeholder=""
                                                    value="{{ $Cate->ten_danh_muc }}" name="ten_danh_muc" />
                                            </div>
                                            @error('ten_danh_muc')
                                                <br>
                                                <div class="alert alert-danger col-md-9">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Chọn ảnh</label>
                                            <input type="file" class="form-control-file" name="hinh_anh" />
                                            <img src="{{ Storage::url($Cate->hinh_anh) }}" alt="" width="100">
                                            @error('hinh_anh')
                                                <br>
                                                <div class="alert alert-danger col-md-9">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-9">
                                            <label for="comment">Mô tả</label>
                                            <textarea class="form-control" name="mo_ta" rows="5">{{ $Cate->mo_ta }}</textarea>
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
                                <a class="btn btn-secondary" href="{{ route('admin.category.index') }}">
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
