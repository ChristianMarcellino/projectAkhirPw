<?php

namespace App\Http\Controllers;

use App\Models\PengirimanBerkas;
use App\Models\Konsumen;
use App\Models\Bank;
use App\Models\Marketing;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PengirimanBerkasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pengirimanberkas = PengirimanBerkas::all();
        $konsumen = Konsumen::all();
        $bank = Bank::all();
        $marketing = Marketing::all();
        return view('pengirimanberkas.index', compact('pengirimanberkas', 'konsumen', 'bank', 'marketing'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $konsumen = Konsumen::all();
    $bank = Bank::all();
    $marketing = Marketing::all();

    return view('pengirimanberkas.create', compact('konsumen', 'bank', 'marketing'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'id_konsumen' => 'required',
            'id_bank' => 'required',
            'id_marketing' => 'required',
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
    public function edit(PengirimanBerkas $pengirimanberkas)
    {
        Gate::authorize('admin-only');
        $konsumen = Konsumen::all();
        $bank = Bank::all();
        $marketing = Marketing::all();
        return view('pengirimanberkas.edit', compact('pengirimanberkas', 'konsumen', 'bank', 'marketing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PengirimanBerkas $pengirimanberkas)
    {
        Gate::authorize('admin-only');
        $request->validate([
            'id_konsumen' => 'required',
            'id_bank' => 'required',
            'id_marketing' => 'required',
            'tanggal_kirim' => 'required|date',
            'status' => 'required|in:diterima,diproses,ditolak',
        ]);
        $pengirimanberkas->update($request->all());
        return redirect()->route('pengirimanberkas.index')->with('success', 'Data Pengiriman Berkas Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PengirimanBerkas $pengirimanberkas)
    {
        Gate::authorize('admin-only');
        $pengirimanberkas->delete();
        return redirect()->route('pengirimanberkas.index')->with('success', 'Data Pengiriman Berkas Berhasil Dihapus');
    }
}