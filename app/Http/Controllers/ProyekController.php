<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

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
            'harga_rumah' => 'required||max:2000000000',
            'luas_tanah' => 'required',
            'harga_kelebihan_tanah' => 'required||max:2000000000',
            'alamat' => 'required'
        ]);

        Proyek::create($input);
        return redirect()->route('proyek.index')->with('success', 'Data Proyek Berhasil Ditambah');

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
        Gate::authorize('admin-only');
        return view('proyek.edit',compact('proyek'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyek $proyek)
    {
        Gate::authorize('admin-only');
        $input = $request->validate([
            'no_pbg' => ['required',Rule::unique('proyek','no_pbg')->ignore($proyek->id),'max:19'],
            'nama_proyek' => ['required',Rule::unique('proyek','nama_proyek')->ignore($proyek->id)],
            'jumlah_unit' => 'required',
            'harga_rumah' => 'required||max:2000000000',
            'luas_tanah' => 'required',
            'harga_kelebihan_tanah' => 'required||max:2000000000',
            'alamat' => 'required'
        ]);

        $proyek->update($input);
        return redirect()->route('proyek.index')->with('success', 'Data Proyek Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyek $proyek){
        Gate::authorize('admin-only');

        try {
            $proyek->delete();
            return redirect()->route('proyek.index')->with('success', 'Data Proyek Berhasil Dihapus');
        }catch (\Exception $e) {
            return redirect()->route('proyek.index')->with('error', 'Gagal menghapus Data Proyek.');
        }
    }
}
