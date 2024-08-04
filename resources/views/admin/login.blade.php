<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập admin</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('theme/login_reg/assets/images/logos/favicon.png')}}" />
    <link rel="stylesheet" href="{{asset('theme/login_reg/assets/css/styles.min.css')}}" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="{{asset('theme/login_reg/assets/images/logos/dark-logo.svg')}}" width="180" alt="">
                                </a>
                                <p class="text-center">Your Social Campaigns</p>
                                <form action="{{ route('postLogin') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="email">
                                            @error('email')
                                            <br>
                                            <div class="alert alert-danger ">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" name="mat_khau">
                                        @error('mat_khau')
                                        <br>
                                        <div class="alert alert-danger ">{{ $message }}</div>
                                    @enderror
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        {{-- <div class="form-check">
                                            <input class="form-check-input primary" type="checkbox" value=""
                                                id="flexCheckChecked" checked>
                                            <label class="form-check-label text-dark" for="flexCheckChecked">
                                                Remeber this Device
                                            </label>
                                        </div> --}}
                                        {{-- <a class="text-primary fw-bold" href="#">Forgot Password ?</a> --}}
                                    </div>
                                    {{-- <a href="#" class="btn btn-primary w-100 fs-4 mb-4 rounded-2">Sign In</a> --}}
                                    <button class="btn btn-primary w-100 fs-4 mb-4 rounded-2" type="submit">Sign In</button>
                                    {{-- <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">New to Spike?</p>
                                        <a class="text-primary fw-bold ms-2"
                                            href="./authentication-register.html">Create an account</a>
                                    </div> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('theme/login_reg/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('theme/login_reg/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('error'))
        <script>
            Swal.fire({
                title: "Đăng nhập thất bại",
                text: "tài khoản hoặc mật khẩu sai",
                icon: "error"
            });
        </script>
    @endif
    @if (session('info'))
        <script>
            Swal.fire({
                title: "Đăng nhập thất bại",
                text: "tài khoản không đủ quyền hạn",
                icon: "info"
            });
        </script>
    @endif
</body>

</html>
