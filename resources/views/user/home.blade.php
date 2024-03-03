@extends('user.layout.layout')
@section('content-user')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">DASHBOARD |
                                @if (auth()->user()->role)
                                    <div class="btn btn-sm btn-light"> {{ auth()->user()->role }}

                                        <i class="fa fa-user"></i>
                                    </div>
                                @endif

                            </h4>
                            {{-- START CARDS --}}
                            <div class="col-12 m-b-30">
                                <h4 class="d-inline">
                                    @if (auth()->user()->role)
                                        Selamat Datang, {{ auth()->user()->name }}
                                    @endif
                                </h4>
                                <p class="text-muted">
                                    @if (auth()->user()->role)
                                        {{ auth()->user()->email }}
                                    @endif
                                </p>
                                {{-- @if (auth()->user()->role == 'admin')
                                    <div class="row">
                                        <div class="col-md-6 col-lg-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">Pendapatan</h5>
                                                    <p class="card-text">
                                                        <a href="#">
                                                            <img src="/assets/images/income.png" style="margin-left: 30px;"
                                                                width="100" height="100" alt="">
                                                        </a>
                                                    </p>
                                                    <p class="card-text"><small class="text-muted">Transaksi Terakhir 3 jam
                                                            lalu</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <div class="col-md-6 col-lg-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">Pelanggan</h5>
                                                    <p class="card-text">
                                                        <a href="#">
                                                            <img src="/assets/images/user.png" style="margin-left: 30px;"
                                                                width="100" height="100" alt="">
                                                        </a>
                                                    </p>
                                                    <p class="card-text"><small class="text-muted">Update Terakhir 3 jam
                                                            lalu</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <div class="col-md-6 col-lg-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">Produk Terdaftar</h5>
                                                    <p class="card-text">
                                                        <a href="#">
                                                            <img src="/assets/images/produk.png" style="margin-left: 30px;"
                                                                width="100" height="100" alt="">
                                                        </a>
                                                    </p>
                                                    <p class="card-text"><small class="text-muted">Update Terakhir 3 jam
                                                            lalu</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <div class="col-md-6 col-lg-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">Analys</h5>
                                                    <p class="card-text">
                                                        <a href="#">
                                                            <img src="/assets/images/analis.png" style="margin-left: 30px;"
                                                                width="100" height="100" alt="">
                                                        </a>
                                                    </p>
                                                    <p class="card-text"><small class="text-muted">Update Terakhir 3 jam
                                                            lalu</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                    </div>
                                    {{-- END CARDS --}}
                                {{-- @endif --}}

                                {{-- @if (auth()->user()->role == 'kasir') --}}
                                {{-- START CAROUSEL --}}
                                {{-- <div class="col-lg-12">
                                        <div class="bootstrap-carousel">
                                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block w-100" src="/assets/images/big/img1.jpg"
                                                            alt="First slide">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" src="/assets/images/big/img2.jpg"
                                                            alt="Second slide">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" src="/assets/images/big/img4.jpg"
                                                            alt="Third slide">
                                                    </div>
                                                </div><a class="carousel-control-prev" href="#carouselExampleControls"
                                                    data-slide="prev"><span class="carousel-control-prev-icon"></span>
                                                    <span class="sr-only">Previous</span> </a><a
                                                    class="carousel-control-next" href="#carouselExampleControls"
                                                    data-slide="next"><span class="carousel-control-next-icon"></span>
                                                    <span class="sr-only">Next</span></a>
                                            </div>
                                        </div>
                                    </div>
                            </div> --}}
                                {{-- @endif --}}
                                {{-- END CAROUSEL --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
    @endsection
