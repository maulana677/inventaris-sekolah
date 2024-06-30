<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreSupplierRequest;
use App\Http\Requests\AdminUpdateSupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier = Supplier::all();
        return view('admin.supplier.index', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminStoreSupplierRequest $request)
    {
        $supplier = new Supplier();
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->alamat = $request->alamat;
        $supplier->telepon = $request->telepon;
        $supplier->save();

        toastr()->success('Data Berhasil Dibuat!');
        return redirect()->route('supplier.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('admin.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUpdateSupplierRequest $request, string $id)
    {
        $supplier = Supplier::findOrFail($id);
        // Memeriksa apakah ada perubahan pada data
        $isChanged = false;

        if ($request->has('nama_supplier') && $request->nama_supplier !== $supplier->nama_supplier) {
            $supplier->nama_supplier = $request->nama_supplier;
            $isChanged = true;
        }

        if ($request->has('alamat') && $request->alamat !== $supplier->alamat) {
            $supplier->alamat = $request->alamat;
            $isChanged = true;
        }

        if ($request->has('telepon') && $request->telepon !== $supplier->telepon) {
            $supplier->telepon = $request->telepon;
            $isChanged = true;
        }

        // Jika tidak ada perubahan, langsung kembali ke halaman index
        if (!$isChanged) {
            toastr()->info('Tidak ada perubahan data.');
            return redirect()->route('supplier.index');
        }

        // Simpan perubahan dan tampilkan pesan sukses
        $supplier->save();

        toastr()->success('Data Berhasil Diubah!');
        return to_route('supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Supplier::findOrFail($id)->delete();
            return response(['status' => 'success', 'message' => 'Data berhasil dihapus!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Terjadi sesuatu!']);
        }
    }
}
