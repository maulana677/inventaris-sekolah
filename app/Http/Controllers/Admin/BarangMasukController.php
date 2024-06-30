<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreBarangMasukRequest;
use App\Http\Requests\AdminUpdateBarangMasukRequest;
use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangMasuk = BarangMasuk::with('barang', 'supplier')->get();
        return view('admin.barang-masuk.index', compact('barangMasuk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = Barang::all();
        $supplier = Supplier::all();
        return view('admin.barang-masuk.create', compact('barang', 'supplier'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminStoreBarangMasukRequest $request)
    {
        // Simpan data barang masuk
        $barangMasuk = new BarangMasuk();
        $barangMasuk->barang_id = $request->barang_id;
        $barangMasuk->supplier_id = $request->supplier_id;
        $barangMasuk->jumlah = $request->jumlah;
        $barangMasuk->tanggal_masuk = $request->tanggal_masuk;
        $barangMasuk->save();

        toastr()->success('Data Berhasil Dibuat!');
        return redirect()->route('barang-masuk.index');
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
        $barangMasuk = BarangMasuk::findOrFail($id);
        $barang = Barang::all();
        $supplier = Supplier::all();
        return view('admin.barang-masuk.edit', compact('barangMasuk', 'barang', 'supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUpdateBarangMasukRequest $request, string $id)
    {
        $barangMasuk = BarangMasuk::findOrFail($id);

        // Update data barang masuk
        $barangMasuk->barang_id = $request->barang_id;
        $barangMasuk->supplier_id = $request->supplier_id;
        $barangMasuk->jumlah = $request->jumlah;
        $barangMasuk->tanggal_masuk = $request->tanggal_masuk;
        $barangMasuk->save();

        toastr()->success('Data Berhasil Diubah!');
        return to_route('barang-masuk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            BarangMasuk::findOrFail($id)->delete();
            return response(['status' => 'success', 'message' => 'Data berhasil dihapus!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Terjadi sesuatu!']);
        }
    }
}
