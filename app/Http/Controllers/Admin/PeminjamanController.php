<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStorePeminjamanRequest;
use App\Http\Requests\AdminUpdatePeminjamanRequest;
use App\Models\Barang;
use App\Models\Peminjaman;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjaman = Peminjaman::with(['barang', 'user'])->get();

        foreach ($peminjaman as $item) {
            if ($item->status == 'dipinjam' && Carbon::now()->gt($item->tanggal_kembali)) {
                $item->status = 'belum dikembalikan';
                $item->save();
            }
        }

        return view('admin.peminjaman.index', compact('peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = Barang::all();
        $user = User::all();
        return view('admin.peminjaman.create', compact('barang', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminStorePeminjamanRequest $request)
    {
        $peminjaman = new Peminjaman();
        $peminjaman->barang_id = $request->barang_id;
        $peminjaman->user_id = $request->user_id;
        $peminjaman->tanggal_pinjam = $request->tanggal_pinjam;
        $peminjaman->tanggal_kembali = $request->tanggal_kembali;
        $peminjaman->status = $request->status;

        if (Carbon::now()->gt($request->tanggal_kembali)) {
            $peminjaman->status = 'belum dikembalikan';
        }

        $peminjaman->save();

        toastr()->success('Data Berhasil Dibuat!');
        return redirect()->route('peminjaman.index');
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
        $peminjaman = Peminjaman::findOrFail($id);
        // Ambil data barang dan user untuk dropdown
        $barang = Barang::all();
        $users = User::all();

        return view('admin.peminjaman.edit', compact('peminjaman', 'barang', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUpdatePeminjamanRequest $request, string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->barang_id = $request->barang_id;
        $peminjaman->user_id = $request->user_id;
        $peminjaman->tanggal_pinjam = $request->tanggal_pinjam;
        $peminjaman->tanggal_kembali = $request->tanggal_kembali;
        $peminjaman->status = $request->status;

        if ($request->status == 'dipinjam' && Carbon::now()->gt($request->tanggal_kembali)) {
            $peminjaman->status = 'belum dikembalikan';
        }

        $peminjaman->save();

        toastr()->success('Data Berhasil Diubah!');
        return to_route('peminjaman.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Peminjaman::findOrFail($id)->delete();
            return response(['status' => 'success', 'message' => 'Data berhasil dihapus!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Terjadi sesuatu!']);
        }
    }
}
