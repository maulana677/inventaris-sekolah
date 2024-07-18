<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $total_barang = Barang::all()->count();

        return view('admin.dashboard.index', compact('total_barang'));
    }

    public function dashboardData()
    {
        $totalBarang = DB::table('barangs')->count();
        $barangMasuk = DB::table('barang_masuks')->count();
        $barangKeluar = DB::table('barang_keluars')->count();
        $totalUsers = DB::table('users')->count();

        return response()->json([
            'total_barang' => $totalBarang,
            'barang_masuk' => $barangMasuk,
            'barang_keluar' => $barangKeluar,
            'total_users' => $totalUsers,
        ]);
    }
}
