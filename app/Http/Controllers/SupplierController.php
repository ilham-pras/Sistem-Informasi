<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datasupplier = Supplier::orderBy('created_at', 'asc')->get();
        return view('supplier.data-supplier', compact('datasupplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.tambah-supplier');
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
            'nama_supplier' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ]);

        Supplier::create([
            'nama_supplier' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
        ]);

        return redirect('/supplier')->with('toast_success', 'Data Berhasil Disimpan!');
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
        $supplier = Supplier::findorfail($id);
        return view('supplier.edit-supplier', compact('supplier'));
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
            'nama_supplier' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ]);

        $supplier = Supplier::findorfail($id);
        $supplier->update([
            'nama_supplier' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
        ]);

        return redirect('/supplier')->with('toast_success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::findorfail($id);
        $supplier->delete();

        return back()->with('success', 'Data Berhasil Dihapus!');
    }

    public function print()
    {
        $data = Supplier::all();

        view()->share('data', $data);
        $pdf = Pdf::loadview('supplier.laporan-supplier');
        return $pdf->download('laporan-supplier.pdf');
    }
}
