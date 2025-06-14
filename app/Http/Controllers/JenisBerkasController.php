<?php

namespace App\Http\Controllers;

use App\Models\JenisBerkas;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

class JenisBerkasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisBerkas = JenisBerkas::all();
        return view('jenis_berkas.index', compact('jenisBerkas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis_berkas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $input = $request->validate([
            'jenis_Berkas' => 'max:100|required|unique:jenis_berkas',
        ]);

        JenisBerkas::create($input);
        return redirect()->route('jenis_berkas.index')->with('success', 'Data Jenis Berkas Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisBerkas $jenisBerkas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisBerkas $jenisBerkas)
    {
        Gate::authorize('admin-only');
        return view('jenis_berkas.edit', compact('jenisBerkas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisBerkas $jenis_berkas)
    {
        Gate::authorize('admin-only');
         $input = $request->validate([
            'jenis_Berkas' => ['max:100','required', Rule::unique('jenis_berkas', 'jenis_Berkas')->ignore($jenis_berkas->id)],
        ]);

        $jenis_berkas->update($input);
        return redirect()->route('jenis_berkas.index')->with('success', 'Data Jenis Berkas Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisBerkas $jenisBerkas)
    {
        Gate::authorize('admin-only');
        $jenisBerkas->delete();
        return redirect()->route('jenis_berkas.index')->with('success', 'Data Jenis Berkas Berhasil Dihapus');
    }
}
