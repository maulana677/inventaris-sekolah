@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Ubah Riwayat Stok</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('riwayat-stok.index') }}">Riwayat Stok</a></div>
                <div class="breadcrumb-item">Ubah Riwayat Stok</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Riwayat Stok</h2>
            <p class="section-lead">
                Di halaman ini Anda dapat mengubah data riwayat stok.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Ubah Riwayat Stok</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('riwayat-stok.update', $riwayatStok->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <select name="barang_id" class="form-control select2" id="barang_id" required>
                                        <option disabled selected>Pilih Barang</option>
                                        @foreach ($barang as $barang)
                                            <option value="{{ $barang->id }}"
                                                {{ $barang->id == $riwayatStok->barang_id ? 'selected' : '' }}>
                                                {{ $barang->nama_barang }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('barang_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input name="tanggal" type="date" class="form-control" id="tanggal"
                                        value="{{ $riwayatStok->tanggal }}" required>
                                    @error('tanggal')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <input name="jumlah" type="number" class="form-control" id="jumlah"
                                        value="{{ $riwayatStok->jumlah }}" required>
                                    @error('jumlah')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Jenis</label>
                                    <select name="jenis" class="form-control" id="jenis" required>
                                        <option disabled selected>Pilih Jenis</option>
                                        <option value="masuk" {{ $riwayatStok->jenis == 'masuk' ? 'selected' : '' }}>
                                            Masuk</option>
                                        <option value="keluar" {{ $riwayatStok->jenis == 'keluar' ? 'selected' : '' }}>
                                            Keluar</option>
                                    </select>
                                    @error('jenis')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea name="keterangan" class="form-control" id="keterangan">{{ $riwayatStok->keterangan }}</textarea>
                                    @error('keterangan')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
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
