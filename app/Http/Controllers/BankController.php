<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Notaris;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bank = Bank::all();
        return view('bank.index', compact('bank'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $notaris = Notaris::all();
        return view('bank.create', compact('notaris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'nama_bank' => 'required|max:50|unique:bank',
            'alamat_bank' => 'required|max:100',
            'no_telp_bank' => ['required', 'max:13', 'regex:/^(08|07)[0-9]{8,11}$/'],
            'notaris_id' => 'required|exists:notaris,id'
        ]);

        Bank::create($input);
        return redirect()->route('bank.index')->with('success', 'Data Bank Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bank $bank)
    {
        $notaris = \App\Models\Notaris::all();
        return view('bank.edit', compact('bank', 'notaris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bank $bank)
    {
        $input = $request->validate([
            'nama_bank' => 'required|max:50|unique:bank,nama_bank,' . $bank->id,
            'alamat_bank' => 'required|max:100',
            'no_telp_bank' => ['required', 'max:13', 'regex:/^(08|07)[0-9]{8,11}$/'],
            'nik_notaris' => 'required|exists:notaris,id'
        ]);

        $bank->update($input);
        return redirect()->route('bank.index')->with('success', 'Data Bank Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bank $bank)
    {
        $bank->delete();
        return redirect()->route('bank.index')->with('success', 'Data Bank Berhasil Dihapus');
    }
}
