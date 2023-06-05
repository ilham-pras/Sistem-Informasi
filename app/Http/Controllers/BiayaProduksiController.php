<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use Illuminate\Http\Request;
use App\Models\BiayaProduksi;
use Illuminate\Support\Facades\DB;

class BiayaProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $databiayaproduksi = DB::table('biaya_produksi')
            ->join('produksi', 'produksi.id_produksi', '=', 'biaya_produksi.id_produksi')
            ->select('biaya_produksi.*', 'produksi.nama_barang')
            ->orderBy('biaya_produksi.created_at', 'asc')
            ->get();
        return view('biaya-produksi.biaya-produksi', compact('databiayaproduksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataproduksi = Produksi::all();
        return view('biaya-produksi.tambah-biaya', compact('dataproduksi'));
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
            'biaya_bahan_baku' => 'required',
            'biaya_tenaga_kerja' => 'required',
            'biaya_overhead' => 'required',
        ]);

        // $total_biaya_produksi = $request->input('biaya_bahan_baku') + $request->input('biaya_tenaga_kerja') + $request->input('biaya_overhead');
        BiayaProduksi::create([
            'id_produksi' => $request->id_produksi,
            'biaya_bahan_baku' => $request->biaya_bahan_baku,
            'biaya_tenaga_kerja' => $request->biaya_tenaga_kerja,
            'biaya_overhead' => $request->biaya_overhead,
            'total_biaya_produksi' => $request->biaya_bahan_baku + $request->biaya_tenaga_kerja + $request->biaya_overhead
        ]);

        return redirect('/biaya-produksi')->with('toast_success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BiayaProduksi  $biayaProduksi
     * @return \Illuminate\Http\Response
     */
    public function show(BiayaProduksi $biayaProduksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BiayaProduksi  $biayaProduksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produksi = Produksi::all();
        $biayaproduksi = BiayaProduksi::findorfail($id);
        return view('biaya-produksi.edit-biaya', compact('biayaproduksi', 'produksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BiayaProduksi  $biayaProduksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_produksi' => 'required',
            'biaya_bahan_baku' => 'required',
            'biaya_tenaga_kerja' => 'required',
            'biaya_overhead' => 'required',
        ]);

        $biayaproduksi = BiayaProduksi::findorfail($id);
        $biayaproduksi->update([
            'id_produksi' => $request->id_produksi,
            'biaya_bahan_baku' => $request->biaya_bahan_baku,
            'biaya_tenaga_kerja' => $request->biaya_tenaga_kerja,
            'biaya_overhead' => $request->biaya_overhead,
            'total_biaya_produksi' => $request->biaya_bahan_baku + $request->biaya_tenaga_kerja + $request->biaya_overhead
        ]);

        return redirect('/biaya-produksi')->with('toast_success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BiayaProduksi  $biayaProduksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $biayaproduksi = BiayaProduksi::findorfail($id);
        $biayaproduksi->delete();

        return back()->with('success', 'Data Berhasil Dihapus!');
    }
}
