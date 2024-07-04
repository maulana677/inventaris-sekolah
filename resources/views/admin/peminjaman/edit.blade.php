@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Ubah Peminjaman</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Posts</a></div>
                <div class="breadcrumb-item">Ubah Peminjaman</div>
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
                            <h4>Ubah Peminjaman</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <select name="barang_id" class="form-control select2" id="barang_id" required>
                                        <option disabled selected>Pilih Barang</option>
                                        @foreach ($barang as $barangs)
                                            <option value="{{ $barangs->id }}"
                                                {{ $barangs->id == $peminjaman->barang_id ? 'selected' : '' }}>
                                                {{ $barangs->nama_barang }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('barang_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nama Pengguna</label>
                                    <select name="user_id" class="form-control select2" id="user_id" required>
                                        <option disabled selected>Pilih Pengguna</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                {{ $user->id == $peminjaman->user_id ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                    <input name="tanggal_pinjam" type="date" class="form-control" id="tanggal_pinjam"
                                        value="{{ $peminjaman->tanggal_pinjam }}" required>
                                    @error('tanggal_pinjam')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_kembali">Tanggal Kembali</label>
                                    <input name="tanggal_kembali" type="date" class="form-control" id="tanggal_kembali"
                                        value="{{ $peminjaman->tanggal_kembali }}">
                                    @error('tanggal_kembali')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control" id="status" required>
                                        <option disabled selected>Pilih Status</option>
                                        <option value="dipinjam" {{ $peminjaman->status == 'dipinjam' ? 'selected' : '' }}>
                                            Dipinjam</option>
                                        <option value="dikembalikan"
                                            {{ $peminjaman->status == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan
                                        </option>
                                    </select>
                                    @error('status')
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
