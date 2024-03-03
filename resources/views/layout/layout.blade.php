<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $title }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="/assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="#">
                    <b class="logo-abbr"><img src="/assets/images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="/assets/images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img src="/assets/images/logo-text.png" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">

                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            @if (auth()->user() && auth()->user()->role == 'user')
                                <a href="{{ route('user.checkout.index') }}">
                                    <img src="/assets/images/user/shopping-cart-svgrepo-com.svg" height="30"
                                        width="30">
                                    @if (!empty($cartItems) && is_array($cartItems))
                                        @foreach ($cartItems as $idBarang => $item)
                                            <p hidden>{{ $item['idBarang'] }}</p>
                                        @endforeach
                                        <span
                                            class="badge gradient-3 badge-pill badge-primary">{{ count($cartItems) }}</span>
                                    @endif
                                </a>
                            @endif
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="/assets/images/user/1.png" height="40" width="40" alt="">
                            </div>
                            @if (auth()->user()->role)
                                {{ auth()->user()->name }}
                            @endif
                            <div class="drop-down dropdown-profile   dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="/profile"><i class="icon-user"></i>
                                                <span>Profile</span></a>
                                        </li>
                                        <hr class="my-2">
                                        <li><a href="{{ route('logout') }}"><i class="icon-key"></i>
                                                <span>Logout</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    @if (auth()->user()->role == 'admin')
                        <li>
                            <a href="#" aria-expanded="false">
                                <i class="icon-badge menu-icon"></i><span class="nav-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-label">UI Components</li>
                        <li>
                            <a href="{{ route('admin.diskon.index') }}" aria-expanded="false">
                                <i class="icon-badge menu-icon"></i><span class="nav-text">Setting Diskon</span>
                            </a>
                        </li>

                        <li class="mega-menu mega-menu-sm">
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Data Master</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="/user">Data User</a></li>
                                <li><a href="/jenisBarang">Data Jenis Barang</a></li>
                                <li><a href="/dataBarang">Data Barang</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('admin.laporan.index') }}" aria-expanded="false">
                                <i class="icon-badge menu-icon"></i><span class="nav-text">Data Laporan</span>
                            </a>
                        </li>
                    @endif

                    @if (auth()->user()->role == 'user')
                        <li>
                            <a href="{{ route('user.transaksi.cart') }}" aria-expanded="false">
                                <i class="icon-badge menu-icon"></i><span class="nav-text">Shoping</span>
                            </a>
                        </li>
                    @endif

                    {{-- DATA KASIR --}}
                    @if (auth()->user()->role == 'kasir' || auth()->user()->role == 'admin')
                        <li>
                            <a href="{{ auth()->user()->role == 'admin' ? route('admin.transaksi.index') : route('kasir.transaksi.index') }}"
                                aria-expanded="false">
                                <i class="icon-badge menu-icon"></i><span class="nav-text">Data Transaksi</span>
                            </a>
                        </li>
                    @endif

                    {{-- @if (auth()->user()->role == 'admin' || auth()->user()->role == 'kasir')  --}}
                    {{-- @endif --}}

                    {{-- @if (auth()->user()->role == 'admin') --}}
                    {{-- @endif --}}
                    {{-- <li>
                        <a href="/Laporan" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Beli Pelanggan</span>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        @yield('content')

        <!--**********************************
            Footer start
        ***********************************-->
        {{-- <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="#">Free</a>
                    2018</p>
            </div>
        </div> --}}
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="/assets/plugins/common/common.min.js"></script>
    <script src="/assets/js/custom.min.js"></script>
    <script src="/assets/js/settings.js"></script>
    <script src="/assets/js/gleek.js"></script>
    <script src="/assets/js/styleSwitcher.js"></script>

    <script src="/assets/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
    <script src="/assets/https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/assets/https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Oops...',
                text: '{{ $message }}',
            })
        </script>
    @endif

</body>

</html>
