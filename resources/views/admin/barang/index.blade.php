@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Barang</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Semua Barang</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Barang</h2>
            <p class="section-lead">
                Di halaman ini Anda dapat melihat semua data.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Semua Barang</h4>
                            <div class="card-header-action">
                                <a href="{{ route('barang.create') }}" class="btn btn-success">Create New <i
                                        class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table">
                                    <thead>
                                        <tr>
                                            <th class="text-left">
                                                No
                                            </th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Deskripsi</th>
                                            <th>Kategori</th>
                                            <th>Lokasi</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Kondisi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barang as $barangs)
                                            <tr>
                                                <td>{{ ++$loop->index }}</td>
                                                <td>{{ $barangs->kode_barang }}</td>
                                                <td>{{ $barangs->nama_barang }}</td>
                                                <td>{{ $barangs->deskripsi }}</td>
                                                <td>{{ $barangs->kategori->nama_kategori }}</td>
                                                <td>{{ $barangs->lokasi->nama_lokasi }}</td>
                                                <td>{{ $barangs->jumlah }}</td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($barangs->tanggal_masuk)->translatedFormat('d F Y') }}
                                                </td>
                                                <td>
                                                    @if ($barangs->kondisi == 'baik')
                                                        <span class="badge badge-success">Baik</span>
                                                    @elseif($barangs->kondisi == 'rusak')
                                                        <span class="badge badge-danger">Rusak</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('barang.edit', $barangs->id) }}"
                                                        class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('barang.destroy', $barangs->id) }}"
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
