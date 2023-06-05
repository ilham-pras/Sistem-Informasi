<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengguna;
use App\Models\TenagaKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TenagaKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datatenaga = DB::table('tenaga_kerja')
            ->join('pengguna', 'pengguna.id_pengguna', '=', 'tenaga_kerja.id_pengguna')
            ->select('tenaga_kerja.*', 'pengguna.level')
            ->orderBy('tenaga_kerja.created_at', 'asc')
            ->get();
        return view('tenaga-kerja.tenaga-kerja', compact('datatenaga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datapengguna = Pengguna::all();
        return view('tenaga-kerja.tambah-tenaga', compact('datapengguna'));
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
            'id_pengguna' => 'required',
            'nama_tenaga_kerja' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
        ]);

        TenagaKerja::create([
            'id_pengguna' => $request->id_pengguna,
            'nama_tenaga_kerja' => $request->nama_tenaga_kerja,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
        ]);

        return redirect('/tenaga-kerja')->with('toast_success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TenagaKerja  $tenagaKerja
     * @return \Illuminate\Http\Response
     */
    public function show(TenagaKerja $tenagaKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TenagaKerja  $tenagaKerja
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengguna = Pengguna::all();
        $tenagakerja = TenagaKerja::findorfail($id);
        return view('tenaga-kerja.edit-tenaga', compact('tenagakerja', 'pengguna'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TenagaKerja  $tenagaKerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pengguna' => 'required',
            'nama_tenaga_kerja' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
        ]);

        $tenagakerja = TenagaKerja::findorfail($id);
        $tenagakerja->update([
            'id_pengguna' => $request->id_pengguna,
            'nama_tenaga_kerja' => $request->nama_tenaga_kerja,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
        ]);

        return redirect('/tenaga-kerja')->with('toast_success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TenagaKerja  $tenagaKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tenagakerja = TenagaKerja::findorfail($id);
        $tenagakerja->delete();

        return back()->with('success', 'Data Berhasil Dihapus!');
    }
}
