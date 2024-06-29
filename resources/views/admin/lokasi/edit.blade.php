@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Update Lokasi</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Lokasi</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('lokasi.update', $lokasi->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Nama lokasi</label>
                        <input name="nama_lokasi" type="text" class="form-control"
                            value="{{ old('nama_lokasi', $lokasi->nama_lokasi) }}" required>
                        @error('nama_lokasi')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $lokasi->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
