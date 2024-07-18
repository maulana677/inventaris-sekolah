@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Detail Pengguna</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('users.index') }}">Pengguna</a></div>
                <div class="breadcrumb-item">Detail Pengguna</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pengguna</h2>
            <p class="section-lead">
                Di halaman ini Anda dapat melihat detail pengguna.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Detail Pengguna</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input name="name" type="text" class="form-control" id="name"
                                    value="{{ $user->name }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input name="email" type="email" class="form-control" id="email"
                                    value="{{ $user->email }}" disabled>
                            </div>
                            <a href="{{ route('users.index') }}" class="btn btn-warning">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
