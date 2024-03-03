@extends('user.layout.layout')
@section('content-user')
    <style>
        .input-group {
            display: flex;
            align-items: center;
        }

        input {
            width: 40px;
            text-align: center;

        }

        i {
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>

    {{-- @section('content') --}}
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

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <nav class="navbar navbar-light bg-light justify-content-between">
                                @foreach ($data_barang as $d)
                                    <a class="navbar-brand">{{ $title }} | {{ $d->namaJenis }}</a>
                                @endforeach
                                {{-- <form class="form-inline">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Search"
                                        aria-label="Search">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                </form> --}}
                            </nav>
                        </div>
                        @foreach ($data_user as $user)
                            @php
                                $usr = $user->id;
                            @endphp
                        @endforeach

                        @foreach ($data_barang as $item)
                            <form action="{{ route('user.keranjang.tambah_barang', [$item->idBarang]) }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="card-group">
                                        <div class="card" style="width: 18rem;">
                                            <img class="card-img-top"
                                                src="{{ asset('storage/img-produk/' . $item->img_produk) }}"
                                                style="width: 200px;" alt="Card image cap">

                                            <input type="text" value="{{ $item->idBarang }}" hidden name="idBarang">
                                            <input type="text" value="{{ $item->img_produk }}" hidden name="img_produk">
                                            <div class="card-body">
                                                @if ($item->idJenis == true)
                                                    <h4>{{ $item->namaBarang }}
                                                        <input type="text" value="{{ $item->namaBarang }}" hidden
                                                            name="namaBarang">
                                                        @foreach ($data_diskon as $disk)
                                                            <div class="btn btn-sm btn-outline-warning">
                                                                {{ $disk->diskon }}%
                                                                <i class="fa fa-tag"></i>
                                                            </div>
                                                        @endforeach
                                                    </h4>
                                                @endif
                                                {{-- SET DISKON --}}
                                                @php
                                                    $diskon = $disk->diskon / 100;
                                                    $totalDisk = $diskon * $item->harga;
                                                @endphp
                                                <span style="color: green">Rp.
                                                    {{ number_format($totalDisk) }} |
                                                    <i class="fa fa-tag"> Diskon</i>
                                                </span>
                                                {{-- END SET DISKON --}}

                                                <h3 style="color: red;" id="finalHarga">
                                                    Rp. {{ number_format($item->harga - $diskon) }}
                                                </h3>

                                                <strike style="color: grey;">
                                                    <h5 style="color: grey;">Rp. {{ number_format($item->harga) }}</h5>
                                                </strike>

                                                <span name="stok"
                                                    style="font-family: 'Times New Roman', Times, serif; font-size: 14px;">
                                                    Stok : {{ $item->stok }}
                                                </span>
                                                <input type="text" value="{{ $item->stok }}" name="stok" hidden>

                                                {{-- TAMPILKAN DATA (HIDE) --}}
                                                <input type="text" value="{{ $item->harga - $diskon }}"
                                                    name="finalHarga" hidden>
                                                <input class="form-control" type="text" value="{{ $nomor }}"
                                                    name="noTransaksi" hidden>
                                                <input class="form-control" type="text" value="{{ $item->namaJenis }}"
                                                    name="jbarang" hidden>
                                                {{-- END DATA HIDE --}}

                                                @if ($item->stok != 0)
                                                    <div class="input-group">
                                                        <i class="fa fa-minus" onclick="decrement()">Kurang</i>
                                                        <input type="number" id="counter" value="0" min="0"
                                                            name="qty">
                                                        <i class="fa fa-plus" onclick="increment()">Tambah</i>
                                                    </div>
                                                    <br>
                                                    <a
                                                        href="whatsapp://send?text=Hai, Anda sedang terhubung dengan operator kami (Sirie). Untuk bertanya ke aplikasi dengan cepat, harap kirim pesan ini tanpa perubahan. Setelah pesan terkirim silahkan kembali ke aplikasi dengan mengklik tautan. 
                                                        http://localhost:8000/transaksi/cart &phone=+6282331016638">
                                                        <div class="btn btn-outline-secondary">
                                                            <i class="fa fa-whatsapp"></i>
                                                        </div>
                                                    </a>
                                                    <button class="btn btn-outline-secondary" type="submit">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                    <button class="btn btn-danger" type="submit">Beli Langsung</button>
                                                @else
                                                    <div>
                                                        <span>STOK HABIS</span> |
                                                        <a href="{{ route('user.transaksi.cart') }}"
                                                            style="color: red;">KEMBALI</a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                        @endforeach
                        </form>

                    </div>

                </div>
                {{-- <iframe name="produk" src="" width="100%" height="550" frameborder="0"></iframe> --}}
            </div>
        </div>
    </div>

    {{-- SCRIPT UNTUK FUNGSI TAMBAH KURANG --}}
    <script>
        const counterElement = document.getElementById('counter');

        function increment() {
            counterElement.stepUp();
        }

        function decrement() {
            counterElement.stepDown();
        }
    </script>
    {{-- END --}}

    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Oops...',
                text: '{{ $message }}',
            })
        </script>
    @endif
@endsection
