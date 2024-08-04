<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{ route('admin.index') }}" class="logo">
                <img src="{{ asset('theme/admin/assets/img/kaiadmin/logo_light.svg') }}" alt="navbar brand"
                    class="navbar-brand" height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item ">
                    <a href="{{ route('admin.index') }}" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <hr>
                <li class="nav-item ">
                    <a href="{{ route('admin.category.index') }}" aria-expanded="false">
                        <i class="fa fa-layer-group"></i>
                        <p>Danh Mục</p>
                    </a>
                </li>
                <hr>
                <li class="nav-item ">
                    <a href="{{ route('admin.product.index') }}" aria-expanded="false">
                        <i class="fas fa-layer-group"></i>
                        <p>Sản phẩm</p>
                    </a>
                </li>
                <hr>
                <li class="nav-item ">
                    <a href="{{ route('admin.promotion.index') }}" aria-expanded="false">
                        <i class="fas fa-layer-group"></i>
                        <p>khuyến mãi</p>
                    </a>
                </li>
                <hr>
                <li class="nav-item ">
                    <a href="{{ route('admin.banner.index') }}" aria-expanded="false">
                        <i class="fas fa-layer-group"></i>
                        <p>Banner</p>
                    </a>
                </li>
                <hr>
                <li class="nav-item ">
                    <a href="{{ route('admin.bill.index') }}" aria-expanded="false">
                        <i class="fas fa-layer-group"></i>
                        <p>Hóa đơn</p>
                    </a>
                </li>
                <hr>
                <li class="nav-item ">
                    <a href="{{ route('admin.user.index') }}" aria-expanded="false">
                        <i class="fas fa-layer-group"></i>
                        <p>Người dùng</p>
                    </a>
                </li>
                <hr>
                @if ((Auth::user()->vai_tro_id) >= 3)
                    <li class="nav-item ">
                        <a href="{{ route('admin.employee.index') }}" aria-expanded="false">
                            <i class="fas fa-layer-group"></i>
                            <p>Nhân Viên</p>
                        </a>
                    </li>
                    <hr>
                @endif
            </ul>
        </div>
    </div>
</div>
