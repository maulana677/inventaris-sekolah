@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Buat Lokasi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('lokasi.index') }}">Lokasi</a></div>
                <div class="breadcrumb-item">Buat Lokasi</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Lokasi</h2>
            <p class="section-lead">
                Di halaman ini Anda dapat membuat lokasi baru dan mengisi semua kolom.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Tambah Lokasi</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('lokasi.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Nama Lokasi</label>
                                    <input name="nama_lokasi" type="text" class="form-control" id="nama_lokasi">
                                    @error('nama_lokasi')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control"></textarea>
                                    @error('deskripsi')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Buat</button>
                            </form>
                        </div>
                    </div>
    </section>
@endsection
