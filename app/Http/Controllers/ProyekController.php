<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proyek = Proyek::all();
        return view('proyek.index')->with('proyek',$proyek);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('proyek.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'no_pbg' => 'required|unique:proyek|max:19',
            'nama_proyek' => 'required|unique:proyek',
            'jumlah_unit' => 'required',
            'harga_rumah' => 'required',
            'luas_tanah' => 'required',
            'harga_kelebihan_tanah' => 'required',
            'alamat' => 'required'
        ]);

        Proyek::create($input);
        return redirect()->route('proyek.index')->with('success', 'Proyek Berhasil Disimpan');


    }

    /**
     * Display the specified resource.
     */
    public function show(Proyek $proyek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyek $proyek)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyek $proyek)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyek $proyek)
    {
        $proyek->delete();
        return redirect()->route('proyek.index')->with('success', 'Proyek Berhasil Disimpan');
    }
}
