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
                            </div>
                        </div>
                        @foreach ($data_diskon as $d)
                            <form action="{{ route('admin.diskon.update', $d->id) }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <label>Diskon</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-append"><span class="input-group-text">%</span>
                                                </div>
                                                <input type="number" class="form-control" value="{{ $d->diskon }}"
                                                    placeholder="Diskon" name="diskon" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i>
                                        Simpan</button>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
@endsection
