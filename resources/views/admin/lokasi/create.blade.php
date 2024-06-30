@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Lokasi</h1>
        </div>
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
