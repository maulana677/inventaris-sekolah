@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Ubah Barang</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('barang.index') }}">Barang</a></div>
                <div class="breadcrumb-item">Ubah Barang</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Barang</h2>
            <p class="section-lead">
                Di halaman ini Anda dapat mengubah semua data.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Ubah Barang</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('barang.update', $barang->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="kode_barang">Kode Barang</label>
                                    <input name="kode_barang" type="text" class="form-control" id="kode_barang"
                                        value="{{ $barang->kode_barang }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="">Nama Barang</label>
                                    <input name="nama_barang" type="text" class="form-control" id="nama_barang"
                                        value="{{ old('nama_barang', $barang->nama_barang) }}">
                                    @error('nama_barang')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $barang->deskripsi) }}</textarea>
                                    @error('deskripsi')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kategori_id">Kategori</label>
                                    <select name="kategori_id" id="kategori_id" class="form-control">
                                        <option>Pilih Kategori</option>
                                        @foreach ($kategori as $kategori)
                                            <option value="{{ $kategori->id }}"
                                                {{ old('kategori_id', $barang->kategori_id) == $kategori->id ? 'selected' : '' }}>
                                                {{ $kategori->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="lokasi_id">Lokasi</label>
                                    <select id="lokasi_id" class="form-control" name="lokasi_id">
                                        <option value="">Pilih Lokasi</option>
                                        @foreach ($lokasi as $lokasi)
                                            <option value="{{ $lokasi->id }}"
                                                {{ old('kategori_id', $barang->lokasi_id) == $lokasi->id ? 'selected' : '' }}>
                                                {{ $lokasi->nama_lokasi }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('lokasi_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input id="jumlah" type="number" class="form-control" name="jumlah"
                                        value="{{ old('jumlah', $barang->jumlah) }}">
                                    @error('jumlah')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_masuk">Tanggal Masuk</label>
                                    <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk"
                                        value="{{ old('tanggal_masuk', $barang->tanggal_masuk) }}">
                                    @error('tanggal_masuk')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kondisi">Kondisi</label>
                                    <select class="form-control" id="kondisi" name="kondisi">
                                        <option value="baik" {{ $barang->kondisi == 'baik' ? 'selected' : '' }}>Baik
                                        </option>
                                        <option value="rusak" {{ $barang->kondisi == 'rusak' ? 'selected' : '' }}>Rusak
                                        </option>
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
