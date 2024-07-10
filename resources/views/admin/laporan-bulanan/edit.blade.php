@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Ubah Laporan Bulanan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('laporan-bulanan.index') }}">Laporan Bulanan</a></div>
                <div class="breadcrumb-item">Ubah Laporan Bulanan</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Laporan Bulanan</h2>
            <p class="section-lead">
                Di halaman ini Anda dapat mengubah laporan bulanan.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Form Ubah Laporan Bulanan</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('laporan-bulanan.update', $laporanBulanan->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="bulan">Bulan</label>
                                    <select name="bulan" id="bulan" class="form-control">
                                        <option value="1" {{ $laporanBulanan->bulan == 1 ? 'selected' : '' }}>Januari
                                        </option>
                                        <option value="2" {{ $laporanBulanan->bulan == 2 ? 'selected' : '' }}>Februari
                                        </option>
                                        <option value="3" {{ $laporanBulanan->bulan == 3 ? 'selected' : '' }}>Maret
                                        </option>
                                        <option value="4" {{ $laporanBulanan->bulan == 4 ? 'selected' : '' }}>April
                                        </option>
                                        <option value="5" {{ $laporanBulanan->bulan == 5 ? 'selected' : '' }}>Mei
                                        </option>
                                        <option value="6" {{ $laporanBulanan->bulan == 6 ? 'selected' : '' }}>Juni
                                        </option>
                                        <option value="7" {{ $laporanBulanan->bulan == 7 ? 'selected' : '' }}>Juli
                                        </option>
                                        <option value="8" {{ $laporanBulanan->bulan == 8 ? 'selected' : '' }}>Agustus
                                        </option>
                                        <option value="9" {{ $laporanBulanan->bulan == 9 ? 'selected' : '' }}>
                                            September</option>
                                        <option value="10" {{ $laporanBulanan->bulan == 10 ? 'selected' : '' }}>Oktober
                                        </option>
                                        <option value="11" {{ $laporanBulanan->bulan == 11 ? 'selected' : '' }}>
                                            November</option>
                                        <option value="12" {{ $laporanBulanan->bulan == 12 ? 'selected' : '' }}>
                                            Desember</option>
                                    </select>
                                    @error('bulan')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tahun">Tahun</label>
                                    <input type="number" name="tahun" id="tahun" class="form-control"
                                        value="{{ $laporanBulanan->tahun }}" required>
                                    @error('tahun')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="total_barang_masuk">Total Barang Masuk</label>
                                    <input type="number" name="total_barang_masuk" id="total_barang_masuk"
                                        class="form-control" value="{{ $laporanBulanan->total_barang_masuk }}" required>
                                    @error('total_barang_masuk')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="total_barang_keluar">Total Barang Keluar</label>
                                    <input type="number" name="total_barang_keluar" id="total_barang_keluar"
                                        class="form-control" value="{{ $laporanBulanan->total_barang_keluar }}" required>
                                    @error('total_barang_keluar')
                                        <div class="text-danger">{{ $message }}</div>
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
