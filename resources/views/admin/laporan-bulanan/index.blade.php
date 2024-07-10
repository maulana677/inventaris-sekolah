@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Laporan Bulanan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Laporan Bulanan</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Laporan Bulanan</h2>
            <p class="section-lead">
                Di halaman ini Anda dapat melihat semua data laporan bulanan.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Semua Laporan Bulanan</h4>
                            <div class="card-header-action">
                                <a href="{{ route('laporan-bulanan.create') }}" class="btn btn-success">Create New <i
                                        class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <a href="{{ route('laporan-bulanan.pdf') }}" class="btn btn-success mb-3">
                                    <i class="fas fa-print"></i> Cetak Semua Data</a>
                                <table class="table table-striped" id="table">
                                    <thead>
                                        <tr>
                                            <th class="text-left">No</th>
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                            <th>Total Barang Masuk</th>
                                            <th>Total Barang Keluar</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>Dibuat Oleh</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($laporanBulanan as $laporanBulanans)
                                            <tr>
                                                <td>{{ ++$loop->index }}</td>
                                                <td>{{ $laporanBulanans->bulan }}</td>
                                                <td>{{ $laporanBulanans->tahun }}</td>
                                                <td>{{ $laporanBulanans->total_barang_masuk }}</td>
                                                <td>{{ $laporanBulanans->total_barang_keluar }}</td>
                                                <td>{{ \Carbon\Carbon::parse($laporanBulanans->tanggal_dibuat)->translatedFormat('d F Y') }}
                                                </td>
                                                <td>{{ $laporanBulanans->user->name }}</td>
                                                <td>
                                                    <a href="{{ route('laporan-bulanan.edit', $laporanBulanans->id) }}"
                                                        class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('laporan-bulanan.destroy', $laporanBulanans->id) }}"
                                                        class="btn btn-danger delete-item"><i
                                                            class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();

            $('.delete-button').on('click', function() {
                var form = $(this).closest('form');
                if (confirm('Anda yakin ingin menghapus data ini?')) {
                    form.submit();
                }
            });
        });
    </script>
@endpush
