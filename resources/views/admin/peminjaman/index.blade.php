@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Peminjaman</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Semua Peminjaman</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Peminjaman</h2>
            <p class="section-lead">
                Di halaman ini Anda dapat melihat semua data.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Semua Peminjaman</h4>
                            <div class="card-header-action">
                                <a href="{{ route('peminjaman.create') }}" class="btn btn-success">Create New <i
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
                                            <th>Nama Pengguna</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($peminjaman as $item)
                                            <tr>
                                                <td>{{ ++$loop->index }}</td>
                                                <td>{{ $item->barang->nama_barang }}</td>
                                                <td>{{ $item->user->name }}</td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($item->tanggal_pinjam)->translatedFormat('d F Y') }}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($item->tanggal_kembali)->translatedFormat('d F Y') }}
                                                </td>
                                                <td>
                                                    @if ($item->status == 'belum dikembalikan')
                                                        <span class="badge badge-danger">{{ $item->status }}</span>
                                                    @elseif ($item->status == 'dikembalikan')
                                                        <span class="badge badge-success">{{ $item->status }}</span>
                                                    @else
                                                        <span class="badge badge-warning">{{ $item->status }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('peminjaman.edit', $item->id) }}"
                                                        class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('peminjaman.destroy', $item->id) }}"
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
