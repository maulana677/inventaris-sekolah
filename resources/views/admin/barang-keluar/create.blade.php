@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Barang Keluar</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Posts</a></div>
                <div class="breadcrumb-item">Tambah Barang Keluar</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Barang Keluar</h2>
            <p class="section-lead">
                Di halaman ini Anda dapat membuat postingan baru dan mengisi semua kolom.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Buat Barang Keluar</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('barang-keluar.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <select name="barang_id" class="form-control select2" id="barang_id" required>
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
                                    <select name="user_id" class="form-control select2" id="user_id" required>
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
                                    <label for="">Jumlah</label>
                                    <input name="jumlah" type="number" class="form-control" id="jumlah">
                                    @error('jumlah')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Keluar</label>
                                    <input name="tanggal_keluar" type="date" class="form-control" id="tanggal_keluar">
                                    @error('tanggal_keluar')
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
