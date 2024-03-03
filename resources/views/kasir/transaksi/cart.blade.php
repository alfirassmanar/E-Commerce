@extends('user.layout.layout')
@section('content-user')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $title }}</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $title }}</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <style>
            /* Gaya untuk Kartu */
            .card {
                border: 1px solid #ccc;
                border-radius: 5px;
                padding: 10px;
                display: flex;
            }

            /* Gaya untuk Gambar di Samping Kiri */
            .card img {
                width: 100px;
                height: 100px;
                object-fit: cover;
                margin-right: 10px;
                border-radius: 5px;
            }

            /* Gaya untuk Teks di Kartu */
            .card p {
                margin: 0;
            }
        </style>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                {{-- BLOM ADA ISINYA --}}
                            </div>
                        </div>
                        {{-- Start row --}}
                        <div class="row">
                            <div class="col-12 m-b-30">
                                <div class="row">
                                    @foreach ($data_barang as $row)
                                        @if ($row->stok != 0)
                                            {{-- @if ($row->namaJenis == 'Packaged Dry') --}}
                                            <div class="col-md-6 col-lg-3" name="card">
                                                <div class="card">
                                                    <img class="img-fluid"
                                                        src="{{ asset('storage/img-produk/' . $row->img_produk) }}"
                                                        style="width: 150px; height: 150px;" alt="">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $row->namaJenis }}</h5>
                                                        <p style="font-family: 'Times New Roman', Times, serif">
                                                            {{ $row->namaBarang }}</p>
                                                        <br>
                                                        <p class="card-text">
                                                            <small class="text-muted">
                                                                <form
                                                                    action="{{ route('user.transaksi.basket', [$row->idBarang]) }}"
                                                                    method="GET" target="produk">
                                                                    <button class="btn btn-outline-warning">Detail
                                                                        Produk</button>
                                                                </form>
                                                            </small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- @endif --}}
                                        @else
                                            <div class="col-md-6 col-lg-3" name="card">
                                                <div class="card">
                                                    <img class="img-fluid"
                                                        src="{{ asset('storage/img-produk/' . $row->img_produk) }}"
                                                        style="width: 150px; height: 150px;" alt="">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $row->namaJenis }}</h5>
                                                        <p style="font-family: 'Times New Roman', Times, serif">
                                                            {{ $row->namaBarang }}</p>
                                                        <br>
                                                        <p class="card-text">
                                                            <small class="text-muted">
                                                                <span><i class="fa fa-times-circle-o"></i> STOCK
                                                                    HABIS</span>
                                                            </small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    <!-- End Col -->
                                </div>
                            </div>
                        </div>
                        {{-- End Row --}}

                        {{-- <iframe name="produk" src="/kasir/transaksi/produk" width="100%" frameborder="0"></iframe> --}}
                    </div>
                </div>
            </div>

            <!-- #/ container -->
        </div>
    @endsection
