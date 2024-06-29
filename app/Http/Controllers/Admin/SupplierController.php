<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreSupplierRequest;
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
    public function update(Request $request, string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->alamat = $request->alamat;
        $supplier->telepon = $request->telepon;
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
