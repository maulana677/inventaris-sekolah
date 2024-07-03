<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreBarangKeluarRequest;
use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangKeluar = BarangKeluar::all();
        return view('admin.barang-keluar.index', compact('barangKeluar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = Barang::all();
        $user = User::all();
        return view('admin.barang-keluar.create', compact('barang', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminStoreBarangKeluarRequest $request)
    {
        // Simpan data barang masuk
        $barangKeluar = new BarangKeluar();
        $barangKeluar->barang_id = $request->barang_id;
        $barangKeluar->user_id = $request->user_id;
        $barangKeluar->jumlah = $request->jumlah;
        $barangKeluar->tanggal_keluar = $request->tanggal_keluar;
        $barangKeluar->save();

        toastr()->success('Data Berhasil Dibuat!');
        return redirect()->route('barang-keluar.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
