@extends('layout.layout')
@section('content')
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
                            <form action="/laptransaksi/store" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">{{ $title }}</h4>
                                    </div>
                                </div>
                                {{-- <hr />

                                <button class="btn btn-sm btn-primary" type="button" data-target="#modalCreate"
                                    data-toggle="modal"><i class="fa fa-plus"></i> Tambah Data</button>
                                <hr /> --}}

                                @php
                                    $no = 1;
                                @endphp

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>No</th>
                                            <th>Barang</th>
                                            <th>Harga</th>
                                            <th>Qty</th>
                                            <th>SubTotal</th>
                                        </tr>
                                        <tr>
                                            <td>{{ $no }}.</td>
                                            <td>
                                                <a href="/transaksi/cart" class="btn btn-outline-primary">
                                                    <i class="fa fa-shopping-cart"></i> Cart</a>
                                                {{-- <form>
                                                    <select id="categorySelect" class="form-control transparent-input"
                                                        name="idBarang" required>
                                                        <option value="" hidden>-- Nama Produk --</option>
                                                        @foreach ($dBarang as $d)
                                                            <option value="{{ $d->idBarang }}">{{ $d->namaBarang }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </form> --}}

                                            </td>

                                            <td>
                                                <div>
                                                    Price: <span id="harga"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control"
                                                    style="width: 35px; margin-left: -3px;" value="qty?">
                                            </td>
                                            <td>SubTotal</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">Diskon</td>
                                            <td>Diskon</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">Total Bayar</td>
                                            <td>Total Bayar</td>
                                        </tr>
                                    </table>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nomor Transaksi</label>
                                            <input type="text" class="form-control" name="noTransaksi" value="Nt-001"
                                                readonly required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Transaksi</label>
                                            <input type="text" class="form-control" value="{{ date('d/M/y') }}" readonly
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pembayaran</label>
                                            <input type="number" class="form-control" name="pembayaran"
                                                value="uang pembeli" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Kembalian</label>
                                            <input type="number" class="form-control" name="kembalian" value="kembalian"
                                                readonly required>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                Simpan</button>
                            <a href="/transaksi" class="btn btn-danger"><i class="fa fa-undo"></i> Batal</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
@endsection
