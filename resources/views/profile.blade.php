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
                        <hr />
                        @foreach ($data_profile as $d)
                            <form action="/profile/update_profile/{{ $d->id }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <input type="hidden" class="form-control" name="role" value="{{ $d->role }}"
                                        required>
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama"
                                            value="{{ $d->name }}" placeholder="nama lengkap" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email"
                                                    value="{{ $d->email }}" placeholder="email lengkap" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" name="password"
                                                        placeholder="Password" required>
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
