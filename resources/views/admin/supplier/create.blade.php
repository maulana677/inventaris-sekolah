@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Supplier</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Tambah Supplier</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('supplier.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Supplier</label>
                        <input name="nama_supplier" type="text" class="form-control" id="nama_supplier">
                        @error('nama_supplier')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Alamat</label>
                        <textarea name="alamat" class="form-control"></textarea>
                        @error('alamat')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">No Telepon</label>
                        <input name="telepon" type="number" class="form-control" id="telepon">
                        @error('telepon')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Buat</button>
                </form>
            </div>
        </div>
    </section>
@endsection
