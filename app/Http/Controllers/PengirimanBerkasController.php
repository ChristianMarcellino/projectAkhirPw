<?php

namespace App\Http\Controllers;

use App\Models\PengirimanBerkas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengirimanBerkasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pengirimanBerkas = PengirimanBerkas::all();
        return view('pengirimanberkas.index', compact('pengirimanBerkas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pengirimanberkas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nik_konsumen' => 'required|string|max:16',
            'nama_bank' => 'required|string|max:60',
            'nik_marketing' => 'required|string|max:16',
            'tanggal_kirim' => 'required|date',
            'status' => 'required|in:diterima,diproses,ditolak',
        ]);
        PengirimanBerkas::create($request->all());
        return redirect()->route('pengirimanberkas.index')->with('success', 'Data Pengiriman Berkas Berhasil Ditambah');



    }

    /**
     * Display the specified resource.
     */
    public function show(PengirimanBerkas $pengirimanBerkas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PengirimanBerkas $pengirimanBerkas)
    {
        //
        return view('pengirimanberkas.edit', compact('pengirimanBerkas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PengirimanBerkas $pengirimanBerkas)
    {
        //
        $request->validate([
            'nik_konsumen' => 'required|string|max:16',
            'nama_bank' => 'required|string|max:60',
            'nik_marketing' => 'required|string|max:16',
            'tanggal_kirim' => 'required|date',
            'status' => 'required|in:diterima,diproses,ditolak',
        ]);
        $pengirimanBerkas->update($request->all());
        return redirect()->route('pengirimanberkas.index')->with('success', 'Data Pengiriman Berkas Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PengirimanBerkas $pengirimanBerkas)
    {
        //
        $pengirimanBerkas->delete();
        return redirect()->route('pengirimanberkas.index')->with('success', 'Data Pengiriman Berkas Berhasil Dihapus');
    }
}
