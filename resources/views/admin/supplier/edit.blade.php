@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Update Supplier</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Supplier</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Nama Supplier</label>
                        <input name="nama_Supplier" type="text" class="form-control"
                            value="{{ old('nama_supplier', $supplier->nama_supplier) }}" required>
                        @error('nama_Supplier')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Alamat</label>
                        <textarea name="alamat" class="form-control">{{ old('alamat', $supplier->alamat) }}</textarea>
                        @error('alamat')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">No Telepon</label>
                        <input name="telepon" type="number" class="form-control" id="telepon"
                            value="{{ old('telepon', $supplier->telepon) }}">
                        @error('telepon')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
