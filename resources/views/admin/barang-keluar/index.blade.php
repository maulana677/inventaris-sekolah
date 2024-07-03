@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Barang Keluar</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Posts</a></div>
                <div class="breadcrumb-item">Barang Keluar</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Barang Keluar</h2>
            <p class="section-lead">
                Di halaman ini Anda dapat melihat semua data.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Semua Barang Keluar</h4>
                            <div class="card-header-action">
                                <a href="{{ route('barang-keluar.create') }}" class="btn btn-success">Create New <i
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
                                            <th>Nama Barang</th>
                                            <th>Nama Supplier</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barangKeluar as $barangKeluars)
                                            <tr>
                                                <td>{{ ++$loop->index }}</td>
                                                <td>{{ $barangKeluars->barang->nama_barang }}</td>
                                                <td>{{ $barangKeluars->user->name }}</td>
                                                <td>{{ $barangKeluars->jumlah }}</td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($barangKeluars->tanggal_masuk)->translatedFormat('d F Y') }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('barang-keluar.edit', $barangKeluars->id) }}"
                                                        class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('barang-keluar.destroy', $barangKeluars->id) }}"
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
