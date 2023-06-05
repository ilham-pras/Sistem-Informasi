<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use App\Models\StokProduksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StokProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datastokproduksi = DB::table('stok_produksi')
            ->join('produksi', 'produksi.id_produksi', '=', 'stok_produksi.id_produksi')
            ->select('stok_produksi.*', 'produksi.nama_barang')
            ->orderBy('stok_produksi.created_at', 'asc')
            ->get();
        return view('stok-produksi.stok-produksi', compact('datastokproduksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataproduksi = Produksi::all();
        return view('stok-produksi.tambah-stokproduksi', compact('dataproduksi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'id_produksi' => 'required',
            'jumlah_stok' => 'required',
        ]);

        StokProduksi::create([
            'id_produksi' => $request->id_produksi,
            'jumlah_stok' => $request->jumlah_stok
        ]);

        return redirect('/stok-produksi')->with('toast_success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StokProduksi  $stokProduksi
     * @return \Illuminate\Http\Response
     */
    public function show(StokProduksi $stokProduksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StokProduksi  $stokProduksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produksi = Produksi::all();
        $stokproduksi = StokProduksi::findorfail($id);
        return view('stok-produksi.edit-stokproduksi', compact('stokproduksi', 'produksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StokProduksi  $stokProduksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_produksi' => 'required',
            'jumlah_stok' => 'required',
        ]);

        $stokproduksi = StokProduksi::findorfail($id);
        $stokproduksi->update($request->all());

        return redirect('/stok-produksi')->with('toast_success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StokProduksi  $stokProduksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stokproduksi = StokProduksi::findorfail($id);
        $stokproduksi->delete();

        return back()->with('success', 'Data Berhasil Dihapus!');
    }
}
