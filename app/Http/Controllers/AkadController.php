<?php

namespace App\Http\Controllers;

use App\Models\Akad;
use App\Models\Konsumen;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

class AkadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $akad=Akad::all();
        return view('akad.index', compact('akad'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $konsumen=Konsumen::all();
        return view('akad.create', compact('konsumen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input=$request->validate([
            'konsumen_id' => 'required|exists:konsumen,id|unique:akad',
            'tanggal_akad' => 'required',
            'tempat_akad' => 'required|max:100'
        ]);

        Akad::create($input);
        return redirect()->route('akad.index')->with('success', 'Data Akad Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Akad $akad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Akad $akad)
    {
        Gate::authorize('admin-only');
        $konsumen=Konsumen::all();
        return view('akad.edit', compact('akad', 'konsumen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Akad $akad)
    {
        Gate::authorize('admin-only');
         $input = $request->validate([
            'konsumen_id' => ['required','exists:konsumen,id', Rule::unique('akad', 'konsumen_id')->ignore($akad->id)],
            'tanggal_akad' => 'required',
            'tempat_akad' => 'required|max:100'
        ]);

        $akad->update($input);
        return redirect()->route('akad.index')->with('success', 'Data Akad Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Akad $akad)
    {
        Gate::authorize('admin-only');
        $akad->delete();
        return redirect()->route('akad.index')->with('success', 'Data Akad Berhasil Dihapus');
    }
}
