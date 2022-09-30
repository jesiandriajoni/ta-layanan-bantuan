<nav
    class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">@yield('navbar-judul', 'Dashboard')</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">@yield('navbar-judul', 'Dashboard')</h6>
        </nav>
        {{-- //////////////////////// --}}

        <li class="nav-item d-flex align-items-center">
            <a href="" style="margin-right:8px" class="nav-link text-body font-weight-bold px-0 mr-5">
                <i class="fa fa-user me-sm-1" aria-hidden="true"></i>
                <span class="d-sm-inline d-none">
                    @if (defined('IS_ADMIN'))
                        {{ Auth::guard('admin')->user()->name }}
                    @endif

                    @if (defined('IS_SUPERVISOR'))
                    {{ Auth::guard('supervisor')->user()->name }}
                    @endif

                    @if (defined('IS_TEKNISI'))
                    {{ Auth::guard('teknisi')->user()->nama_teknisi }}
                    @endif

                    @if (defined('IS_PELANGGAN'))
                    {{ Auth::guard('pelanggan')->user()->nama_instansi }}
                    @endif
                </span>
            </a>

            <a href="/admin/logout" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-sign-out"></i>
                <span class="d-sm-inline d-none">Logout</span>
            </a>
        </li>
        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
            <div class="sidenav-toggler-inner">
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
            </div>
            </a>
            </li>

    </div>
</nav>
