<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataoutlet = DB::table('outlet')
            ->join('gudang', 'gudang.id_gudang', '=', 'outlet.id_gudang')
            ->join('barang', 'barang.id_barang', '=', 'gudang.id_barang')
            ->join('produksi', 'produksi.id_produksi', '=', 'barang.id_produksi')
            ->join('kategori_barang', 'kategori_barang.id_kategori_barang', '=', 'barang.id_kategori_barang')
            ->select('outlet.*', 'barang.harga_jual', 'produksi.nama_barang')
            ->orderBy('outlet.created_at', 'asc')
            ->get();
        return view('outlet.data-outlet', compact('dataoutlet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datagudang = DB::table('gudang')
            ->join('barang', 'barang.id_barang', '=', 'gudang.id_barang')
            ->join('produksi', 'produksi.id_produksi', '=', 'barang.id_produksi')
            ->join('kategori_barang', 'kategori_barang.id_kategori_barang', '=', 'barang.id_kategori_barang')
            ->select('gudang.*', 'produksi.nama_barang', 'barang.harga_jual')
            ->orderBy('gudang.created_at', 'asc')
            ->get();
        return view('outlet.tambah-outlet', compact('datagudang'));
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
            'id_gudang' => 'required',
            'nama_outlet' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'jumlah_stok' => 'required',
        ]);

        Outlet::create([
            'id_gudang' => $request->id_gudang,
            'nama_outlet' => $request->nama_outlet,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'jumlah_stok' => $request->jumlah_stok,
        ]);

        return redirect('/outlet')->with('toast_success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function show(Outlet $outlet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gudang = DB::table('gudang')
            ->join('barang', 'barang.id_barang', '=', 'gudang.id_barang')
            ->join('produksi', 'produksi.id_produksi', '=', 'barang.id_produksi')
            ->join('kategori_barang', 'kategori_barang.id_kategori_barang', '=', 'barang.id_kategori_barang')
            ->select('gudang.*', 'produksi.nama_barang', 'barang.harga_jual')
            ->orderBy('gudang.created_at', 'asc')
            ->get();
        $outlet = Outlet::findorfail($id);
        return view('outlet.edit-outlet', compact('gudang', 'outlet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_gudang' => 'required',
            'nama_outlet' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'jumlah_stok' => 'required',
        ]);

        $outlet = Outlet::findorfail($id);
        $outlet->update([
            'id_gudang' => $request->id_gudang,
            'nama_outlet' => $request->nama_outlet,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'jumlah_stok' => $request->jumlah_stok,
        ]);

        return redirect('/outlet')->with('toast_success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gudang = Outlet::findorfail($id);
        $gudang->delete();

        return back()->with('success', 'Data Berhasil Dihapus!');
    }
}
