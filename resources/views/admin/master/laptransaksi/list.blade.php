@extends('admin.layout.layout')
@section('content-admin')
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
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">{{ $title }}</h4>
                                {{-- <button type="button" class="btn btn-sm btn-outline-success btn-round ml-auto"
                                    data-toggle="modal" data-target="#modalCreate" style="margin-top: 10px;">
                                    <i class="fa fa-file-excel-o"></i>
                                    <span>Export Excel</span>
                                </button> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Transaksi</th>
                                            <th>Harga</th>
                                            <th>Tanggal</th>
                                            <th>SubTotal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp

                                        @foreach ($data_laporan as $row)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $row->noTransaksi }}</td>
                                                <td>{{ $row->harga }}</td>
                                                <td>{{ $row->tglTransaksi }}</td>
                                                <td>{{ $row->totalBayar }}</td>
                                                <td>
                                                    <a href="#modalEdit{{ $row->id }}" data-toggle="modal"
                                                        class="btn btn-xs btn-primary">
                                                        <i class="fa fa-edit"></i>
                                                        Detail</a>
                                                    {{-- <a href="#modalHapus{{ $row->id }}" data-toggle="modal"
                                                        class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>
                                                        Hapus</a> --}}
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
        <!-- #/ container -->
    </div>

    {{-- <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Data Jenis Barang</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form action="/jenisBarang/store" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Jenis</label>
                            <input type="text" class="form-control" name="jenisBarang" placeholder="Jenis Barang"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>
                            Batal</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

    @foreach ($data_laporan as $d)
        <div class="modal fade" id="modalEdit{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Transaksi</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>No Transaksi</label>
                            <h5>{{ $d->noTransaksi }}</h5>
                            <hr />
                        </div>
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" value="{{ $d->namaBarang }}" class="form-control" name="namaBarang"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Transaksi</label>
                            <input type="date" value="{{ $d->tglTransaksi }}" class="form-control" name="tglTransaksi"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Sub Total</label>
                            <input type="number" value="{{ $d->totalBayar }}" class="form-control" name="totalBayar"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Pembayaran "CASH"</label>
                            <input type="number" value="{{ $d->pembayaran }}" class="form-control" name="pembayaran"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Kembalian</label>
                            <input type="number" value="{{ $d->kembalian }}" class="form-control" name="kembalian"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i>
                            Batal</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- @foreach ($data_laporan as $c)
        <div class="modal fade" id="modalHapus{{ $c->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data Laporan</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form action="laporan/destroy/{{ $c->id }}" method="GET">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <h5>Apakah Anda ingin menghapus Jenis : "{{ $c->noTransaksi }}" ?</h5>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>
                                Batal</button>
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach --}}
@endsection
