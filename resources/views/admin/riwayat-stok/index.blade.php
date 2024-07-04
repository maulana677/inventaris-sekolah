@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Riwayat Stok</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Semua Riwayat Stok</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Riwayat Stok</h2>
            <p class="section-lead">
                Di halaman ini Anda dapat melihat semua data riwayat stok.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Semua Riwayat Stok</h4>
                            <div class="card-header-action">
                                <a href="{{ route('riwayat-stok.create') }}" class="btn btn-success">Create New <i
                                        class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table">
                                    <thead>
                                        <tr>
                                            <th class="text-left">No</th>
                                            <th>Nama Barang</th>
                                            <th>Tanggal</th>
                                            <th>Jumlah</th>
                                            <th>Jenis</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($riwayatStoks as $item)
                                            <tr>
                                                <td class="text-left">{{ ++$loop->index }}</td>
                                                <td>{{ $item->barang->nama_barang }}</td>
                                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                                                </td>
                                                <td>{{ $item->jumlah }}</td>
                                                <td>
                                                    @if ($item->jenis == 'masuk')
                                                        <span class="badge badge-success">Masuk</span>
                                                    @else
                                                        <span class="badge badge-danger">Keluar</span>
                                                    @endif
                                                </td>
                                                <td>{{ $item->keterangan }}</td>
                                                <td>
                                                    <a href="{{ route('riwayat-stok.edit', $item->id) }}"
                                                        class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('riwayat-stok.destroy', $item->id) }}"
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
