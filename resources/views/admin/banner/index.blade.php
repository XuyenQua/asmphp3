@extends('admin.master')

@section('title')
    Danh sách banner
@endsection

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">banner</h3>
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
                        <a href="#">Danh sách Banner</a>
                    </li>
                </ul>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Danh sách Banner</h4>
                                {{-- <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    Thêm mới
                                </button> --}}
                                <a class="btn btn-primary btn-round ms-auto" href="{{ route('admin.banner.create') }}">
                                    <i class="fa fa-plus"></i>
                                    Thêm mới
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->
                            {{-- <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold"> New</span>
                                                <span class="fw-light"> Row </span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="small">
                                                Create a new row using this form, make sure you
                                                fill them all
                                            </p>
                                            <form>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Name</label>
                                                            <input id="addName" type="text" class="form-control"
                                                                placeholder="fill name" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pe-0">
                                                        <div class="form-group form-group-default">
                                                            <label>Position</label>
                                                            <input id="addPosition" type="text" class="form-control"
                                                                placeholder="fill position" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Office</label>
                                                            <input id="addOffice" type="text" class="form-control"
                                                                placeholder="fill office" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" id="addRowButton" class="btn btn-primary">
                                                Add
                                            </button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Hình Ảnh</th>
                                            <th>Tên banner</th>
                                            <th>Vị Trí</th>
                                            <th>Ngày tạo</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Hình Ảnh</th>
                                            <th>Tên banner</th>
                                            <th>Vị Trí</th>
                                            <th>Ngày tạo</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($listBan as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>
                                                    <img src="{{ Storage::url($item->hinh_anh) }}" width="100"
                                                        alt="">
                                                </td>
                                                <td>{{ $item->ten_banner }}</td>
                                                <td>{{ $item->vi_tri }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                        {{-- <button type="button" data-bs-toggle="tooltip" title=""
                                                            class="btn btn-link btn-primary btn-lg"
                                                            data-original-title="Edit Task">
                                                            <i class="fa fa-edit"></i>
                                                        </button> --}}
                                                        <a class="btn btn-link btn-secondary btn-lg"
                                                            href="{{ route('admin.banner.show', $item->id) }}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a class="btn btn-link btn-primary btn-lg"
                                                            href="{{ route('admin.banner.edit', $item->id) }}">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        {{-- <button type="button" data-bs-toggle="tooltip" title=""
                                                            class="btn btn-link btn-danger" data-original-title="Remove">
                                                            <i class="fa fa-times"></i>
                                                        </button> --}}
                                                        <form id="myForm"
                                                            action="{{ route('admin.banner.destroy', ['id' => $item->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn-delete"><i
                                                                    class="fa fa-times"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            // Add Row
            $("#add-row").DataTable({
                pageLength: 5,
            });

            // var action =
            //     '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

            // $("#addRowButton").click(function() {
            //     $("#add-row")
            //         .dataTable()
            //         .fnAddData([
            //             $("#addName").val(),
            //             $("#addPosition").val(),
            //             $("#addOffice").val(),
            //             action,
            //         ]);
            //     $("#addRowModal").modal("hide");
            // });
        });
    </script>


    @if (session('success'))
        <script>
            Swal.fire({
                title: "Thành Công",
                text: "Xóa thành công",
                icon: "success"
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: "thất bại",
                text: "xóa thất bại",
                icon: "error"
            });
        </script>
    @endif

    @if (session('info'))
        <script>
            Swal.fire({
                title: "banner không tồn tại",
                text: "Không tìm thấy banner",
                icon: "info"
            });
        </script>
    @endif
@endsection
