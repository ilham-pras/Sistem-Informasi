<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\BahanBaku;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class BahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $databahan = DB::table('bahan_baku')
            ->join('supplier', 'supplier.id_supplier', '=', 'bahan_baku.id_supplier')
            ->select('bahan_baku.*', 'supplier.nama_supplier')
            ->orderBy('bahan_baku.created_at', 'asc')
            ->get();
        return view('bahan-baku.data-bahan', compact('databahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $datasupplier = Supplier::all();
        return view('bahan-baku.tambah-bahan', compact('datasupplier'));
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
            'nama_bahan' => 'required',
            'keterangan' => 'required',
            'harga_beli' => 'required',
            'jumlah_bahan' => 'required',
            'tgl_masuk' => 'required',
            'id_supplier' => 'required',
        ]);

        BahanBaku::create([
            'nama_bahan' => $request->nama_bahan,
            'keterangan' => $request->keterangan,
            'harga_beli' => $request->harga_beli,
            'jumlah_bahan' => $request->jumlah_bahan,
            'tgl_masuk' => $request->tgl_masuk,
            'id_supplier' => $request->id_supplier,
        ]);

        return redirect('/bahan-baku')->with('toast_success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::all();
        $bahan = BahanBaku::findorfail($id);
        return view('bahan-baku.edit-bahan', compact('bahan', 'supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bahan' => 'required',
            'keterangan' => 'required',
            'harga_beli' => 'required',
            'jumlah_bahan' => 'required',
            'tgl_masuk' => 'required',
            'id_supplier' => 'required',
        ]);

        $bahan = BahanBaku::findorfail($id);
        $bahan->update([
            'nama_bahan' => $request->nama,
            'keterangan' => $request->keterangan,
            'harga_beli' => $request->harga,
            'jumlah_bahan' => $request->jumlah,
            'tgl_masuk' => $request->tglmasuk,
            'id_supplier' => $request->id_supplier,
        ]);

        return redirect('/bahan-baku')->with('toast_success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bahan = BahanBaku::findorfail($id);
        $bahan->delete();

        return back()->with('success', 'Data Berhasil Dihapus!');
    }

    public function print()
    {
        $data = DB::table('bahan_baku')
        ->join('supplier', 'supplier.id_supplier', '=', 'bahan_baku.id_supplier')
        ->select('bahan_baku.*', 'supplier.nama_supplier')
        ->orderBy('bahan_baku.created_at', 'asc')
        ->get();

        view()->share('data', $data);
        $pdf = Pdf::loadview('bahan-baku.laporan-bahan');
        return $pdf->download('laporan-bahan.pdf');
    }
}
