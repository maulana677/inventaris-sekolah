<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreLaporanBulananRequest;
use App\Http\Requests\AdminUpdateLaporanBulananRequest;
use App\Models\LaporanBulanan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanBulananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporanBulanan = LaporanBulanan::all();
        return view('admin.laporan-bulanan.index', compact('laporanBulanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.laporan-bulanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminStoreLaporanBulananRequest $request)
    {
        // Membuat objek baru berdasarkan model
        $laporanBulanan = new LaporanBulanan();

        // Mengisi properti model dengan data dari request
        $laporanBulanan->bulan = $request->bulan;
        $laporanBulanan->tahun = $request->tahun;
        $laporanBulanan->total_barang_masuk = $request->total_barang_masuk;
        $laporanBulanan->total_barang_keluar = $request->total_barang_keluar;
        $laporanBulanan->tanggal_dibuat = now(); // Atau sesuai kebutuhan Anda
        $laporanBulanan->user_id = auth()->user()->id; // Ubah sesuai dengan autentikasi yang Anda gunakan

        // Simpan data ke dalam database
        $laporanBulanan->save();

        toastr()->success('Data Berhasil Dibuat!');
        return redirect()->route('laporan-bulanan.index');
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
        $laporanBulanan = LaporanBulanan::findOrFail($id);
        $user = User::all();
        return view('admin.laporan-bulanan.edit', compact('laporanBulanan', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUpdateLaporanBulananRequest $request, string $id)
    {
        $laporanBulanan = LaporanBulanan::findOrFail($id);
        $laporanBulanan->bulan = $request->bulan;
        $laporanBulanan->tahun = $request->tahun;
        $laporanBulanan->total_barang_masuk = $request->total_barang_masuk;
        $laporanBulanan->total_barang_keluar = $request->total_barang_keluar;
        $laporanBulanan->user_id = auth()->user()->id; // Menyimpan ID user
        $laporanBulanan->save();

        toastr()->success('Data Berhasil Diubah!');
        return to_route('laporan-bulanan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            LaporanBulanan::findOrFail($id)->delete();
            return response(['status' => 'success', 'message' => 'Data berhasil dihapus!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Terjadi sesuatu!']);
        }
    }

    public function cetakPdf()
    {
        $laporanBulanan = LaporanBulanan::all();
        $pdf = Pdf::loadView('admin.laporan-bulanan.laporan-bulanan-pdf', compact('laporanBulanan'));
        return $pdf->stream('laporan_bulanan.pdf');

        // $mpdf = new \Mpdf\Mpdf();
        // $laporanBulanan = LaporanBulanan::orderBy('bulan', 'ASC')->get();
        // $mpdf->WriteHTML(view('admin.laporan-bulanan.laporan-bulanan-pdf', compact('laporanBulanan')));
        // $mpdf->Output();
    }
}
