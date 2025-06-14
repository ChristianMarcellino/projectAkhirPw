<?php

namespace App\Http\Controllers;

use App\Models\Notaris;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NotarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notaris = Notaris::all();
        return view('notaris.index', compact('notaris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notaris.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'nik_notaris' => 'max:16|required|unique:notaris',
            'nama_notaris' => 'max:50|required',
            'alamat_notaris' => 'max:100|required',
            'no_telp_notaris' => ['required', 'max:13', 'regex:/^(08|07)[0-9]{8,11}$/']
        ]);

        Notaris::create($input);
        return redirect()->route('notaris.index')->with('success', 'Data Notaris Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Notaris $notaris)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notaris $notaris)
    {
        return view('notaris.edit', compact('notaris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notaris $notaris)
    {
        $input = $request->validate([
            'nik_notaris' => ['max:16', 'required', Rule::unique('notaris', 'nik_notaris')->ignore($notaris->id)],
            'nama_notaris' => 'max:50|required',
            'alamat_notaris' => 'max:100|required',
            'no_telp_notaris' => ['required', 'max:13', 'regex:/^(08|07)[0-9]{8,11}$/']
        ]);


        $notaris->update($input);
        return redirect()->route('notaris.index')->with('success', 'Data Notaris Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notaris $notaris)
    {
        $notaris->delete();
        return redirect()->route('notaris.index')->with('success', 'Data Notaris Berhasil Dihapus');
    }
}
