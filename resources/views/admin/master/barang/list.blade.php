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
                                <button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#modalCreate" style="margin-top: 10px;">
                                    <i class="fa fa-plus"></i>
                                    Tambah Data
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Jenis Barang</th>
                                            <th>Stok</th>
                                            <th>Harga</th>
                                            <th>Produk</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp

                                        @foreach ($data_barang as $row)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $row->namaBarang }}</td>
                                                <td>{{ $row->namaJenis }}</td>
                                                <td>{{ $row->stok }}</td>
                                                <td>Rp. {{ number_format($row->harga) }}</td>
                                                <td>
                                                    <img src="{{ asset('storage/img-produk/' . $row->img_produk) }}"
                                                        style="width: 100px;">
                                                </td>
                                                <td>
                                                    <a href="#modalEdit{{ $row->idBarang }}" data-toggle="modal"
                                                        class="btn btn-xs btn-primary">
                                                        <i class="fa fa-edit"></i>
                                                        Edit</a>
                                                    <a href="#modalHapus{{ $row->idBarang }}" data-toggle="modal"
                                                        class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>
                                                        Hapus</a>
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

    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form action="/dataBarang/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" class="form-control" name="namaBarang" placeholder="Nama Barang" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Barang</label>
                            <select class="form-control" name="idJenis" required>
                                <option value="" hidden>-- Jenis Barang --</option>
                                @foreach ($jenis_barang as $b)
                                    <option value="{{ $b->idJenis }}">{{ $b->namaJenis }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" placeholder="Stok" name="stok" required>
                            <div class="input-group-append"><span class="input-group-text">pcs</span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append"><span class="input-group-text">Rp.</span>
                            </div>
                            <input type="number" class="form-control" placeholder="Harga" name="harga" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append"><span class="input-group-text">Produk</span>
                            </div>
                            <input type="file" class="form-control" name="img_produk" required>
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
    </div>

    @foreach ($data_barang as $d)
        <div class="modal fade" id="modalEdit{{ $d->idBarang }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data Barang</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form action="dataBarang/update/{{ $d->idBarang }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control" name="namaBarang" placeholder="Nama Barang"
                                    value="{{ $d->namaBarang }}" required>
                            </div>
                            <div class="form-group">
                                <label>Jenis Barang</label>
                                <select class="form-control" name="idJenis" required>
                                    <option value="{{ $d->idJenis }}">-- {{ $d->namaJenis }} --</option>
                                    @foreach ($jenis_barang as $b)
                                        <option value="{{ $b->idJenis }}">{{ $b->namaJenis }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" placeholder="Stok" name="stok" required
                                    value="{{ $d->stok }}">
                                <div class="input-group-append"><span class="input-group-text">pcs</span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-append"><span class="input-group-text">Rp.</span>
                                </div>
                                <input type="number" class="form-control" placeholder="Harga" name="harga"
                                    value="{{ $d->harga }}" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-append"><span class="input-group-text">Gambar</span>
                                </div>
                                <input type="file" class="form-control" name="img_produk"
                                    value="{{ $d->img_produk }}" required>
                            </div>
                            <img src="{{ asset('storage/img-produk/' . $d->img_produk) }}" style="width: 100px;">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                    class="fa fa-undo"></i>
                                Batal</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($data_barang as $c)
        <div class="modal fade" id="modalHapus{{ $c->idBarang }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data User</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form action="dataBarang/destroy/{{ $c->idBarang }}" method="GET">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <h5>Apakah Anda ingin menghapus Jenis "{{ $c->namaBarang }}" ?</h5>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                    class="fa fa-undo"></i>
                                Batal</button>
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
