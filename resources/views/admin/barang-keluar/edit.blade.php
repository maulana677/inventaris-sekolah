@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Ubah Barang Masuk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Barang Masuk</a></div>
                <div class="breadcrumb-item">Ubah Barang Masuk</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Barang Masuk</h2>
            <p class="section-lead">
                Di halaman ini Anda dapat mengubah data barang masuk.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Ubah Barang Masuk</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('barang-masuk.update', $barangMasuk->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <select name="barang_id" class="form-control select2" id="barang_id" required>
                                        <option disabled>Pilih Barang</option>
                                        @foreach ($barang as $barangs)
                                            <option value="{{ $barangs->id }}"
                                                {{ $barangMasuk->barang_id == $barangs->id ? 'selected' : '' }}>
                                                {{ $barangs->nama_barang }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('barang_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="supplier_id">Nama Supplier</label>
                                    <select name="supplier_id" class="form-control select2" id="supplier_id" required>
                                        <option disabled>Pilih Supplier</option>
                                        @foreach ($supplier as $suppliers)
                                            <option value="{{ $suppliers->id }}"
                                                {{ $barangMasuk->supplier_id == $suppliers->id ? 'selected' : '' }}>
                                                {{ $suppliers->nama_supplier }}</option>
                                        @endforeach
                                    </select>
                                    @error('supplier_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input name="jumlah" type="number" class="form-control" id="jumlah"
                                        value="{{ $barangMasuk->jumlah }}">
                                    @error('jumlah')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_masuk">Tanggal Masuk</label>
                                    <input name="tanggal_masuk" type="date" class="form-control" id="tanggal_masuk"
                                        value="{{ $barangMasuk->tanggal_masuk }}">
                                    @error('tanggal_masuk')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
