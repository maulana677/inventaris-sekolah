<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreBarangRequest;
use App\Http\Requests\AdminUpdateBarangRequest;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::all();
        return view('admin.barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kode_barang = $this->generateKodeBarang();
        $kategori = Kategori::all();
        $lokasi = Lokasi::all();
        return view('admin.barang.create', compact('kategori', 'lokasi', 'kode_barang'));
    }

    public function store(AdminStoreBarangRequest $request)
    {
        // Simpan data barang
        $barang = new Barang();
        $barang->kode_barang = $this->generateKodeBarang();
        $barang->nama_barang = $request->nama_barang;
        $barang->deskripsi = $request->deskripsi;
        $barang->kategori_id = $request->kategori_id;
        $barang->lokasi_id = $request->lokasi_id;
        $barang->jumlah = $request->jumlah;
        $barang->tanggal_masuk = $request->tanggal_masuk;
        $barang->kondisi = $request->kondisi;
        $barang->save();

        // Redirect atau tampilkan pesan sukses
        toastr()->success('Data Berhasil Dibuat!');
        return redirect()->route('barang.index');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategori = Kategori::all();
        $lokasi = Lokasi::all();
        return view('admin.barang.edit', compact('barang', 'kategori', 'lokasi'));
    }

    public function update(AdminUpdateBarangRequest $request, $id)
    {

        // Ambil data barang yang akan diupdate
        $barang = Barang::findOrFail($id);

        // Update data barang
        if ($request->has('nama_barang') && $request->nama_barang !== $barang->nama_barang) {
            $barang->nama_barang = $request->nama_barang;
        }

        if ($request->has('deskripsi') && $request->deskripsi !== $barang->deskripsi) {
            $barang->deskripsi = $request->deskripsi;
        }

        if ($request->has('kategori_id') && $request->kategori_id !== $barang->kategori_id) {
            $barang->kategori_id = $request->kategori_id;
        }

        if ($request->has('lokasi_id') && $request->lokasi_id !== $barang->lokasi_id) {
            $barang->lokasi_id = $request->lokasi_id;
        }

        if ($request->has('jumlah') && $request->jumlah !== $barang->jumlah) {
            $barang->jumlah = $request->jumlah;
        }

        if ($request->has('tanggal_masuk') && $request->tanggal_masuk !== $barang->tanggal_masuk) {
            $barang->tanggal_masuk = $request->tanggal_masuk;
        }

        if ($request->has('kondisi') && $request->kondisi !== $barang->kondisi) {
            $barang->kondisi = $request->kondisi;
        }

        $barang->save();

        // Redirect atau tampilkan pesan sukses

        toastr()->success('Data Berhasil Diubah!');
        return to_route('barang.index');
    }

    public function destroy($id)
    {
        try {
            Barang::findOrFail($id)->delete();
            return response(['status' => 'success', 'message' => 'Data berhasil dihapus!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Terjadi sesuatu!']);
        }
    }

    // Metode untuk menghasilkan kode barang otomatis, sesuaikan dengan kebutuhan Anda
    public function generateKodeBarang()
    {
        $latestBarang = Barang::latest()->first();
        $nextId = $latestBarang ? $latestBarang->id + 1 : 1;
        return 'B-' . date('ym') . sprintf('%04d', $nextId);
    }
}
