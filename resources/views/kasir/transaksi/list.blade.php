@extends('admin.layout.layout')
@section('content-admin')
    @php
        use Carbon\Carbon;
    @endphp
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    {{-- <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $title }}</a></li> --}}
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
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Total Bayar</th>
                                            <th>Pembayaran</th>
                                            <th>Kembalian</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp

                                        @foreach ($data_transaksi as $row)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>Rp. {{ number_format($row->totalBayar) }}</td>
                                                <td>Rp. {{ number_format($row->pembayaran) }}</td>
                                                <td>Rp. {{ number_format($row->kembalian) }}</td>
                                                <td>
                                                    {{-- <a href="#modalEdit{{ $row->id }}" data-toggle="modal"
                                                        class="btn btn-xs btn-primary">
                                                        <i class="fa fa-edit"></i>
                                                        Edit</a> --}}

                                                    <!-- Tombol Detail -->
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modalDetail{{ $row->id }}"
                                                        tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Detail Transaksi</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <strong>No Transaksi:</strong>
                                                                            {{ $row->noTransaksi }}
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <strong>Tanggal Transaksi:</strong>
                                                                            {{ date('d/M/y', strtotime($row->tglTransaksi)) }}
                                                                        </div>
                                                                        <!-- Tambahkan detail lainnya sesuai kebutuhan -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @if ($row->pembayaran != null)
                                                        <a href="#modalkasir{{ $row->id }}" data-toggle="modal"
                                                            class="btn btn-xs btn-success">
                                                            Paid</a>

                                                        <a href="#" data-toggle="modal"
                                                            data-target="#modalDetail{{ $row->id }}"
                                                            class="btn btn-xs btn-primary">Detail</a>
                                                    @else
                                                        <a href="#modalkasir{{ $row->id }}" data-toggle="modal"
                                                            class="btn btn-xs btn-danger"><i class="fa fa-thumbs-down"></i>
                                                            Bayar</a>
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach

                                        @foreach ($data_transaksi as $d)
                                            <div class="modal fade" id="modalkasir{{ $d->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">KASIR || PEMBAYARAN</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal"><span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('admin.transaksi.kasir', $d->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="modal-body">

                                                                <div class="form-group">
                                                                    <label>Nama Barang</label>
                                                                    <input type="text" value="{{ $d->namaBarang }}"
                                                                        class="form-control" name="namaBarang" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Tanggal Transaksi</label>
                                                                    <input type="text"
                                                                        value="{{ Carbon::now()->format('Y-m-d') }}"
                                                                        class="form-control" name="tglTransaksi" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Jumlah : </label>
                                                                    <span>{{ $d->qty }}</span>
                                                                    <input type="text" value="{{ $d->qty }}"
                                                                        class="form-control" name="qty" hidden required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Sub Total : </label>
                                                                    <span>Rp. {{ number_format($d->totalBayar) }}</span>
                                                                    <input type="text" value="{{ $d->totalBayar }}"
                                                                        class="form-control" name="totalBayar" hidden
                                                                        required>
                                                                </div>
                                                                @php
                                                                    // INISIALISASI
                                                                    $bayar = $d->pembayaran;
                                                                    if ($bayar != null) {
                                                                        echo "
                                                                    <div class='alert alert-success'>
                                                                        Pembayaran berhasil
                                                                    </div>
                                                                    ";
                                                                    } else {
                                                                        echo "
                                                                    <div class='alert alert-danger'>
                                                                        Anda belum membayar
                                                                    </div>
                                                                    ";
                                                                    }
                                                                @endphp
                                                                <hr />
                                                                <div class="form-group">
                                                                    <label>Pembayaran</label>
                                                                    @if ($d->pembayaran == 0)
                                                                        <input type="text" value="0"
                                                                            class="form-control" name="pembayaran" required>
                                                                    @else
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $d->pembayaran }}" name="pembayaran"
                                                                            disabled>
                                                                    @endif
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Kembalian</label>
                                                                    <input type="text" value="{{ $d->kembalian }}"
                                                                        class="form-control" readonly required>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal"><i class="fa fa-undo"></i>
                                                                    Batal</button>
                                                                <button type="submit" class="btn btn-primary"><i
                                                                        class="fa fa-save"></i> Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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
@endsection
