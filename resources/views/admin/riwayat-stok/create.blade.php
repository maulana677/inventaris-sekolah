@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Riwayat Stok</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('riwayat-stok.index') }}">Riwayat Stok</a></div>
                <div class="breadcrumb-item">Tambah Riwayat Stok</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Riwayat Stok</h2>
            <p class="section-lead">
                Di halaman ini Anda dapat membuat riwayat stok baru dan mengisi semua kolom.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Buat Riwayat Stok</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('riwayat-stok.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <select name="barang_id" class="form-control select2" id="barang_id">
                                        <option disabled selected>Pilih Barang</option>
                                        @foreach ($barang as $barangs)
                                            <option value="{{ $barangs->id }}">{{ $barangs->nama_barang }}</option>
                                        @endforeach
                                    </select>
                                    @error('barang_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input name="tanggal" type="date" class="form-control" id="tanggal">
                                    @error('tanggal')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input name="jumlah" type="number" class="form-control" id="jumlah">
                                    @error('jumlah')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jenis">Jenis</label>
                                    <select name="jenis" class="form-control" id="jenis">
                                        <option disabled selected>Pilih Jenis</option>
                                        <option value="masuk">Masuk</option>
                                        <option value="keluar">Keluar</option>
                                    </select>
                                    @error('jenis')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" class="form-control" id="keterangan"></textarea>
                                    @error('keterangan')
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
