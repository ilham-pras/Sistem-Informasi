<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataproduksi = Produksi::orderBy('created_at', 'asc')->get();
        return view('produksi.data-produksi', compact('dataproduksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produksi.tambah-produksi');
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
            'tgl_produksi' => 'required',
            'nama_barang' => 'required',
            'jmlh_bahan' => 'required',
            'jmlh_tenaga' => 'required',
            'jmlh_produksi' => 'required',
            'status' => 'required',
        ]);

        Produksi::create([
            'tgl_produksi' => $request->tgl_produksi,
            'nama_barang' => $request->nama_barang,
            'jmlh_bahan' => $request->jmlh_bahan,
            'jmlh_tenaga' => $request->jmlh_tenaga,
            'jmlh_produksi' => $request->jmlh_produksi,
            'status' => $request->status
        ]);

        return redirect('/produksi')->with('toast_success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function show(Produksi $produksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produksi = Produksi::findorfail($id);
        return view('produksi.edit-produksi', compact('produksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tgl_produksi' => 'required',
            'nama_barang' => 'required',
            'jmlh_bahan' => 'required',
            'jmlh_tenaga' => 'required',
            'jmlh_produksi' => 'required',
            'status' => 'required',
        ]);

        $produksi = Produksi::findorfail($id);
        $produksi->update([
            'tgl_produksi' => $request->tgl_produksi,
            'nama_barang' => $request->nama_barang,
            'jmlh_bahan' => $request->jmlh_bahan,
            'jmlh_tenaga' => $request->jmlh_tenaga,
            'jmlh_produksi' => $request->jmlh_produksi,
            'status' => $request->status
        ]);

        return redirect('/produksi')->with('toast_success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produksi = Produksi::findorfail($id);
        $produksi->delete();

        return back()->with('success', 'Data Berhasil Dihapus!');
    }

    public function print()
    {
        $data = Produksi::orderBy('created_at', 'asc')->get();

        view()->share('data', $data);
        $pdf = Pdf::loadview('produksi.laporan-produksi');
        return $pdf->download('laporan-produksi.pdf');
    }
}
