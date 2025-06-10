<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RumahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = Rumah::query();
        if($request->filled('status_penjualan')){
            $query->where('status_penjualan',$request->status_penjualan);
        }
        if ($request->filled('no_pbg')) {
        $query->where('no_pbg', $request->no_pbg);
        }
        if($request->filled('blok_rumah')){
            $blok = preg_replace('/[0-9]/',' ',$request->input('blok_rumah'));
            $query->where('blok_rumah','LIKE',$blok . '%');
        }

        $rumah= $query->get();
        $proyek = Proyek::all();
        return view ('rumah.index', compact('proyek','rumah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proyek = \App\Models\Proyek::all();
        return view('rumah.create', compact('proyek'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'no_shm_rumah'     => 'required|max:16|unique:rumah',
            'blok_rumah'       => 'required|max:5',
            'harga_dp'         => 'required',
            'luas_tanah_rumah'  => 'required',
            'status_penjualan'     => 'required|in:Tersedia,Booking,Terjual',
            'proyek_id'        => 'required|exists:proyek,id',
        ]);

        Rumah::create($input);
        return redirect()->route('rumah.index')->with('success', 'A new Rumah has been Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rumah $rumah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rumah $rumah)
    {
        $proyek = \App\Models\Proyek::all();
        return view('rumah.edit',compact('rumah','proyek'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rumah $rumah)
    {
        $input = $request->validate([
            'no_shm_rumah'     => ['required','max:16',Rule::unique('rumah','no_shm_rumah')->ignore($rumah->id, '')],
            'blok_rumah'       => 'required|max:5',
            'harga_dp'         => 'required',
            'luas_tanah_rumah'  => 'required',
            'status_penjualan'  => 'required|in:Tersedia,Booking,Terjual',
            'proyek_id' => 'required|exists:proyek,no_pbg',
        ]);

        $rumah->update($input);
        return redirect()->route('rumah.index')->with('success', 'A new Rumah has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rumah $rumah)
    {
        $rumah-> delete();
        return redirect()->route('rumah.index')->with('success','Data Rumah Berhasil Dihapus');
    }
}
