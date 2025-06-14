<?php

namespace App\Http\Controllers;

use App\Models\BiChecking;
use App\Models\Konsumen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BiCheckingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $biChecking = BiChecking::all();
        return view('bi_checking.index', compact('biChecking'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $konsumen = Konsumen::all();
        return view('bi_checking.create', compact('konsumen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'id_checking' => 'required|max:16|unique:bi_checking',
            'konsumen_id' => 'required|exists:konsumen,id',
            'hasil_checking' => 'required|in:kol 1,kol 2,kol 3,kol 4,kol 5',
            'tanggal_checking' => 'required|date',
        ]);

        BiChecking::create($input);
        return redirect()->route('bi_checking.index')->with('success', 'Data Bi Checking Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(BiChecking $biChecking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BiChecking $biChecking)
    {
        $konsumen = Konsumen::all();
        return view('bi_checking.edit', compact('biChecking', 'konsumen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BiChecking $biChecking)
    {
        $input = $request->validate([
            'id_checking' => 'required|max:16|unique:bi_checking,id_checking,' . $biChecking->id,
            'konsumen_id' => 'required|exists:konsumen,id',
            'hasil_checking' => 'required|in:kol 1,kol 2,kol 3,kol 4,kol 5',
            'tanggal_checking' => 'required|date',
        ]);

        $biChecking->update($input);
        return redirect()->route('bi_checking.index')->with('success', 'Data Bi Checking Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BiChecking $biChecking)
    {
        $biChecking->delete();
        return redirect()->route('bi_checking.index')->with('success', 'Data Bi Checking Berhasil Dihapus');
    }
}
