@extends('admin.master')


@section('title')
    sửa banner: {{ $ban->ten_banner }}
@endsection

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">sửa banner : {{ $ban->ten_banner }}</h3>
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
                        <a href="#">sửa banner : {{ $ban->ten_banner }}</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('admin.banner.update', ['id' => $ban->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    sửa banner : {{ $ban->ten_banner }}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-6">
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-3 col-form-label">Tên banner</label>
                                            <div class="col-md-9 p-0">
                                                <input type="text" class="form-control input-full" placeholder=""
                                                    name="ten_banner" value="{{ $ban->ten_banner }}" />
                                            </div>
                                            @error('ten_banner')
                                                <br>
                                                <div class="alert alert-danger col-md-9">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Chọn ảnh</label>
                                            <input type="file" class="form-control-file" name="hinh_anh" />
                                            <img src="{{ Storage::url($ban->hinh_anh) }}" alt="" width="100">
                                            @error('hinh_anh')
                                                <br>
                                                <div class="alert alert-danger col-md-9">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-3 col-form-label">vị trí</label>
                                            <div class="col-md-9 p-0">
                                                <select class="form-select" aria-label="Default select example"
                                                    name="vi_tri">
                                                    <option value=""></option>
                                                    <option value="top" @if ($ban->vi_tri == 'top') selected @endif>trên</option>
                                                    <option value="middle" @if ($ban->vi_tri == 'middle') selected @endif>giữa</option>
                                                    <option value="bottom" @if ($ban->vi_tri == 'bottom') selected @endif>dưới</option>
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
