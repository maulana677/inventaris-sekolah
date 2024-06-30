@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Barang</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('barang.index') }}">Barang</a></div>
                <div class="breadcrumb-item">Buat Barang</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Barang</h2>
            <p class="section-lead">
                Di halaman ini Anda dapat membuat postingan baru dan mengisi semua kolom.
            </p>

            <div class="row">
                <div class="col-12">
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
                                    <select class="form-control select2" id="kategori_id" name="kategori_id" required>
                                        <option disabled selected>Pilih Kategori</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('kategori_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <select class="form-control select2" id="lokasi_id" name="lokasi_id" required>
                                        <option disabled selected>Pilih Lokasi</option>
                                        @foreach ($lokasi as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('lokasi_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama_lokasi }}</option>
                                        @endforeach
                                    </select>
                                    @error('lokasi_id')
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
                                    <label for="tanggal_masuk">Tanggal</label>
                                    <input name="tanggal_masuk" type="date" class="form-control" id="tanggal_masuk">
                                    @error('tanggal_masuk')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kondisi">Kondisi</label>
                                    <select class="form-control" id="kondisi" name="kondisi">
                                        <option value="" disabled selected>Pilih Kondisi</option>
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
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                width: '100%', // Ensure select2 is 100% width
                dropdownAutoWidth: true, // Adjust dropdown width
            });
        });
    </script>
@endpush
