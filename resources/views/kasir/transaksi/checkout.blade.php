@extends('user.layout.layout')
@section('content-user')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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

    <body>

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

            {{-- PERHITUNGAN SEMUA TOTAL --}}
            @php
                // Variabel Kalkulasi
                $subTotal = 0;
                $GabnBarang = '';
                $GabIDBarang = '';
                $totalQty = 0;
                $GabFinalHarga = '';
                
                foreach ($cartItems as $idBarang => $item) {
                    $subTotal += $item['finalHarga'] * $item['qty'];
                    $GabnBarang .= $item['namaBarang']; // menggunakan . untuk menghubungkan
                    $GabIDBarang .= $item['idBarang'] . ','; // menggunakan . untuk menghubungkan
                    $GabFinalHarga .= $item['finalHarga'] . ','; // menggunakan . untuk menghubungkan
                    $totalQty += $item['qty'];
                }
                
                // Remove the trailing comma from GabIDBarang
                $GabIDBarang = rtrim($GabIDBarang, ',');
            @endphp

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <nav class="navbar navbar-light bg-light justify-content-between">
                                    <form action="{{ route('user.checkout.store') }}" id="kirimBarang" method="POST">
                                        @csrf
                                        @foreach ($cartItems as $idBarang => $item)
                                            <div class="card mb-3">
                                                <div class="card-body" style="width: 420px;">
                                                    <img class="card"
                                                        src="{{ asset('storage/img-produk/' . $item['img_produk']) }}"
                                                        style="width: 170px;" alt="Card image cap">
                                                    <h1 class="card-title">{{ $item['noTransaksi'] }}</h1>
                                                    <p class="card-text">
                                                        {{ $item['namaBarang'] }}
                                                    </p>
                                                    <label>
                                                        {{-- <input type="text" value="{{ $item['id'] }}"> --}}
                                                        Rp. {{ number_format($item['finalHarga']) }} | Jumlah :
                                                        ({{ $item['qty'] }})
                                                    </label>
                                                    <h5>
                                                        Total : Rp.
                                                        {{ number_format($total = $item['finalHarga'] * $item['qty']) }}
                                                    </h5>

                                                    {{-- GET HIDEN DATA UNTUK STORE --}}
                                                    <input type="text" value="{{ $GabIDBarang }}" hidden
                                                        name="idBarang">
                                                    <input type="text" value="{{ $GabnBarang }}" hidden
                                                        name="namaBarang">
                                                    <input type="text" value="{{ $item['noTransaksi'] }}" hidden
                                                        name="noTransaksi">
                                                    <input type="text" value="{{ $totalQty }}" hidden
                                                        name="qty">
                                                    <input type="text" value="{{ $GabFinalHarga }}" hidden
                                                        name="harga">

                                                    <input type="text" class="form-control" value="{{ $subTotal }}"
                                                        name="totalBayar" hidden>
                                                    {{-- END --}}
                                    </form>
                                    <br>
                                    {{-- METHOD DESTROY --}}
                                    <form action="{{ route('user.cart.remove', $idBarang) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fa fa-trash"></i> Hapus</button>
                                    </form>
                                    {{-- END --}}
                            </div>
                        </div>
                        @endforeach

                        {{-- UNTUK MENYEIMBANGKAN LAYOUT --}}
                        <form action=""></form>
                        {{-- END --}}

                        {{-- PERHITUNGAN TOTAL BELANJA --}}
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Checkout</h4>
                                    <div class="basic-form">
                                        <div class="form-row">
                                            <div class="col-7">
                                                <p>SubTotal : </p>
                                                <input type="text" class="form-control"
                                                    value="Rp. {{ number_format($subTotal) }}">
                                            </div>

                                            <div class="col">
                                                <p>..</p>
                                                <a href="{{ route('user.transaksi.cart') }}" id=""
                                                    style="color: white;">
                                                    <button class="form-control btn-primary">
                                                        <i class="fa fa-shopping-cart"></i> Beli Lagi
                                                    </button>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <p>..</p>
                                                <button type="submit" class="form-control btn-outline-success"
                                                    id="bayar" onclick="bayar()">
                                                    <i class="fa fa-credit-card"></i> Bayar
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
        </div>
        </div>
        </div>

        {{-- SCRIPT UNTUK FORM DAN BUTTON BAYAR --}}
        <script>
            function bayar() {
                var form = document.getElementById('kirimBarang');
                if (form) {
                    form.submit();
                }
            }
        </script>
        {{-- END SCRIPT --}}
        </div>
    @endsection
