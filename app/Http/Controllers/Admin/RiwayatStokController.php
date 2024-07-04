<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreRiwayatStokRequest;
use App\Http\Requests\AdminUpdateRiwayatStokRequest;
use App\Models\Barang;
use App\Models\RiwayatStok;
use Illuminate\Http\Request;

class RiwayatStokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $riwayatStoks = RiwayatStok::all();
        return view('admin.riwayat-stok.index', compact('riwayatStoks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = Barang::all();
        return view('admin.riwayat-stok.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminStoreRiwayatStokRequest $request)
    {
        $riwayatStok = new RiwayatStok();
        $riwayatStok->barang_id = $request->barang_id;
        $riwayatStok->tanggal = $request->tanggal;
        $riwayatStok->jumlah = $request->jumlah;
        $riwayatStok->jenis = $request->jenis;
        $riwayatStok->keterangan = $request->keterangan;
        $riwayatStok->save();

        toastr()->success('Data Berhasil Dibuat!');
        return redirect()->route('riwayat-stok.index');
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
        $riwayatStok = RiwayatStok::findOrFail($id);
        $barang = Barang::all();
        return view('admin.riwayat-stok.edit', compact('riwayatStok', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUpdateRiwayatStokRequest $request, string $id)
    {
        $riwayatStok = RiwayatStok::findOrFail($id);
        $riwayatStok->barang_id = $request->barang_id;
        $riwayatStok->tanggal = $request->tanggal;
        $riwayatStok->jumlah = $request->jumlah;
        $riwayatStok->jenis = $request->jenis;
        $riwayatStok->keterangan = $request->keterangan;
        $riwayatStok->save();

        toastr()->success('Data Berhasil Diubah!');
        return to_route('riwayat-stok.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            RiwayatStok::findOrFail($id)->delete();
            return response(['status' => 'success', 'message' => 'Data berhasil dihapus!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Terjadi sesuatu!']);
        }
    }
}
