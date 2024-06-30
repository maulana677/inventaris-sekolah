@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Buat Kategori</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Kategori</a></div>
                <div class="breadcrumb-item">Buat Kategori</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Kategori</h2>
            <p class="section-lead">
                Di halaman ini Anda dapat membuat kategori baru dan mengisi semua kolom.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Tambah Kategori</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('kategori.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Nama Kategori</label>
                                    <input name="nama_kategori" type="text" class="form-control" id="nama_kategori">
                                    @error('nama_kategori')
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
                </div>
            </div>
        </div>
    </section>
@endsection
