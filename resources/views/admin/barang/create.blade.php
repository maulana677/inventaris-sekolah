@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Barang</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Tambah Barang</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('barang.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="kode_barang">Kode Barang</label>
                        <input name="kode_barang" type="text" class="form-control" id="kode_barang"
                            value="{{ $kode_barang }}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="">Nama Barang</label>
                        <input name="nama_barang" type="text" class="form-control" id="nama_barang">
                        @error('nama_barang')
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

                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" id="kategori_id" name="kategori_id" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategori as $kategori)
                                <option value="{{ $kategori->id }}"
                                    {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategori')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Lokasi</label>
                        <select class="form-control" id="lokasi_id" name="lokasi_id" required>
                            <option value="">Pilih Lokasi</option>
                            @foreach ($lokasi as $lokasi)
                                <option value="{{ $lokasi->id }}" {{ old('lokasi_id') == $lokasi->id ? 'selected' : '' }}>
                                    {{ $lokasi->nama_lokasi }}</option>
                            @endforeach
                        </select>
                        @error('lokasi')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input id="jumlah" type="number" class="form-control" name="jumlah">
                        @error('jumlah')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tanggal_masuk">Tanggal Masuk</label>
                        <input name="tanggal_masuk" type="date" class="form-control" id="tanggal_masuk">
                        @error('tanggal_masuk')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <select class="form-control" id="kondisi" name="kondisi">
                            <option value="baik">Baik</option>
                            <option value="rusak">Rusak</option>
                        </select>
                        @error('kondisi')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Buat</button>
                </form>
            </div>
        </div>
    </section>
@endsection
