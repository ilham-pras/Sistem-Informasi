<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\KategoriBarang;
use App\Models\Produksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $databarang = DB::table('barang')
            ->join('produksi', 'produksi.id_produksi', '=', 'barang.id_produksi')
            ->join('kategori_barang', 'kategori_barang.id_kategori_barang', '=', 'barang.id_kategori_barang')
            ->select('barang.*', 'produksi.nama_barang', 'kategori_barang.nama_kategori')
            ->orderBy('barang.created_at', 'asc')
            ->get();
        return view('barang.data-barang', compact('databarang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataproduksi = Produksi::all();
        $datakategori = KategoriBarang::all();
        return view('barang.tambah-barang', compact('dataproduksi', 'datakategori'));
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
            'id_produksi' => 'required',
            'id_kategori_barang' => 'required',
            'harga_jual' => 'required',
            'status' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);

        $image = $request->image;
        $file_name = time() . rand(100, 999) . "." . $image->getClientOriginalExtension();

        $barang = new Barang;
        $barang->id_produksi = $request->id_produksi;
        $barang->id_kategori_barang = $request->id_kategori_barang;
        $barang->harga_jual = $request->harga_jual;
        $barang->status = $request->status;
        $barang->image = $file_name;

        $image->move(public_path() . '/foto-barang', $file_name);
        $barang->save();

        return redirect('/barang')->with('toast_success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produksi = Produksi::all();
        $kategoribarang = KategoriBarang::all();
        $barang = Barang::findorfail($id);
        return view('barang.edit-barang', compact('barang', 'produksi', 'kategoribarang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang, $id)
    {
        $request->validate([
            'id_produksi' => 'required',
            'id_kategori_barang' => 'required',
            'harga_jual' => 'required',
            'status' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);

        $ubah = Barang::findorfail($id);
        $ubahimg = $ubah->image;

        $barang = [
            'id_produksi' => $request['id_produksi'],
            'id_kategori_barang' => $request['id_kategori_barang'],
            'harga_jual' => $request['harga_jual'],
            'status' => $request['status'],
            'image' => $ubahimg,
        ];

        $request->image->move(public_path() . '/foto-barang', $ubahimg);
        $ubah->update($barang);

        return redirect('/barang')->with('toast_success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Barang::findorfail($id);
        $file = public_path('/foto-barang/') . $hapus->image;
        //cek jika ada gambar
        if (file_exists($file)) {
            //maka hapus file di folder Public/foto-barang
            @unlink($file);
        }
        $hapus->delete();

        return back()->with('success', 'Data Berhasil Dihapus!');
    }
}
