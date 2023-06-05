<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Produksi;
use App\Models\StokBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StokBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datastokbarang = DB::table('stok_barang')
            ->join('barang', 'barang.id_barang', '=', 'stok_barang.id_barang')
            ->join('produksi', 'produksi.id_produksi', '=', 'barang.id_produksi')
            ->join('kategori_barang', 'kategori_barang.id_kategori_barang', '=', 'barang.id_kategori_barang')
            ->select('stok_barang.*', 'barang.harga_jual', 'produksi.nama_barang', 'kategori_barang.nama_kategori')
            ->orderBy('stok_barang.created_at', 'asc')
            ->get();
        return view('stok-barang.stok-barang', compact('datastokbarang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $databarang = DB::table('barang')
            ->join('produksi', 'produksi.id_produksi', '=', 'barang.id_produksi')
            ->join('kategori_barang', 'kategori_barang.id_kategori_barang', '=', 'barang.id_kategori_barang')
            ->select('barang.*', 'produksi.nama_barang', 'kategori_barang.nama_kategori')
            ->get();
        return view('stok-barang.tambah-stokbarang', compact('databarang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'jumlah_stok' => 'required',
        ]);

        StokBarang::create([
            'id_barang' => $request->id_barang,
            'jumlah_stok' => $request->jumlah_stok,
        ]);

        return redirect('/stok-barang')->with('toast_success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StokBarang  $stokBarang
     * @return \Illuminate\Http\Response
     */
    public function show(StokBarang $stokBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StokBarang  $stokBarang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = DB::table('barang')
            ->join('produksi', 'produksi.id_produksi', '=', 'barang.id_produksi')
            ->join('kategori_barang', 'kategori_barang.id_kategori_barang', '=', 'barang.id_kategori_barang')
            ->select('barang.*', 'produksi.nama_barang', 'kategori_barang.nama_kategori')
            ->get();
        $stokbarang = StokBarang::findorfail($id);
        return view('stok-barang.edit-stokbarang', compact('stokbarang', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StokBarang  $stokBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_barang' => 'required',
            'jumlah_stok' => 'required',
        ]);

        $stokbarang = StokBarang::findorfail($id);
        $stokbarang->update([
            'id_barang' => $request->id_barang,
            'jumlah_stok' => $request->jumlah_stok,
        ]);

        return redirect('/stok-barang')->with('toast_success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StokBarang  $stokBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stokbarang = StokBarang::findorfail($id);
        $stokbarang->delete();

        return back()->with('success', 'Data Berhasil Dihapus!');
    }
}
