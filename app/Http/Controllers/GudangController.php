<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Gudang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datagudang = DB::table('gudang')
            ->join('barang', 'barang.id_barang', '=', 'gudang.id_barang')
            ->join('produksi', 'produksi.id_produksi', '=', 'barang.id_produksi')
            ->join('kategori_barang', 'kategori_barang.id_kategori_barang', '=', 'barang.id_kategori_barang')
            ->select('gudang.*', 'produksi.nama_barang')
            ->orderBy('gudang.created_at', 'asc')
            ->get();
        return view('gudang.data-gudang', compact('datagudang'));
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
            ->select('barang.*', 'produksi.nama_barang')
            ->get();
        return view('gudang.tambah-gudang', compact('databarang'));
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
            'nama_gudang' => 'required',
            'alamat' => 'required',
            'tgl_masuk' => 'required',
            'tgl_keluar' => 'required',
            'kapasitas' => 'required',
        ]);

        Gudang::create([
            'id_barang' => $request->id_barang,
            'nama_gudang' => $request->nama_gudang,
            'alamat' => $request->alamat,
            'tgl_masuk' => $request->tgl_masuk,
            'tgl_keluar' => $request->tgl_keluar,
            'kapasitas' => $request->kapasitas,
        ]);

        return redirect('/gudang')->with('toast_success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function show(Gudang $gudang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = DB::table('barang')
            ->join('produksi', 'produksi.id_produksi', '=', 'barang.id_produksi')
            ->join('kategori_barang', 'kategori_barang.id_kategori_barang', '=', 'barang.id_kategori_barang')
            ->select('barang.*', 'produksi.nama_barang')
            ->get();
        $gudang = Gudang::findorfail($id);
        return view('gudang.edit-gudang', compact('gudang', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_barang' => 'required',
            'nama_gudang' => 'required',
            'alamat' => 'required',
            'tgl_masuk' => 'required',
            'tgl_keluar' => 'required',
            'kapasitas' => 'required',
        ]);

        $gudang = Gudang::findorfail($id);
        $gudang->update([
            'id_barang' => $request->id_barang,
            'nama_gudang' => $request->nama_gudang,
            'alamat' => $request->alamat,
            'tgl_masuk' => $request->tgl_masuk,
            'tgl_keluar' => $request->tgl_keluar,
            'kapasitas' => $request->kapasitas,
        ]);

        return redirect('/gudang')->with('toast_success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gudang = Gudang::findorfail($id);
        $gudang->delete();

        return back()->with('success', 'Data Berhasil Dihapus!');
    }
}
