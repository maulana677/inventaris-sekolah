@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Peminjaman</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('peminjaman.index') }}">Peminjaman</a></div>
                <div class="breadcrumb-item">Tambah Peminjaman</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Peminjaman</h2>
            <p class="section-lead">
                Di halaman ini Anda dapat membuat postingan baru dan mengisi semua kolom.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Buat Peminjaman</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('peminjaman.store') }}" method="POST">
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
                                    <label for="supplier_id">Nama User</label>
                                    <select name="user_id" class="form-control select2" id="user_id">
                                        <option disabled selected>Pilih User</option>
                                        @foreach ($user as $users)
                                            <option value="{{ $users->id }}"
                                                {{ old('user_id') == $users->id ? 'selected' : '' }}>
                                                {{ $users->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                    <input name="tanggal_pinjam" type="date" class="form-control" id="tanggal_pinjam">
                                    @error('tanggal_pinjam')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_kembali">Tanggal Kembali</label>
                                    <input name="tanggal_kembali" type="date" class="form-control" id="tanggal_kembali">
                                    @error('tanggal_kembali')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control" id="status">
                                        <option disabled selected>Pilih Status</option>
                                        <option value="dipinjam">Dipinjam</option>
                                        <option value="dikembalikan">Dikembalikan</option>
                                    </select>
                                    @error('status')
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
