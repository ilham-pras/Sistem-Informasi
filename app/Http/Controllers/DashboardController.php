<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Models\Barang;
use App\Models\Pegawai;
use App\Models\Produksi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahbahan = BahanBaku::count();
        $jumlahproduksi = Produksi::count();
        $jumlahbarang = Barang::count();
        $jumlahpegawai = Pegawai::count();
        return view('dashboard', compact('jumlahbahan', 'jumlahproduksi', 'jumlahbarang', 'jumlahpegawai'));
    }
}
