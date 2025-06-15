<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Notaris;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bank=Bank::paginate(10);
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
            'nama_bank' => 'required|max:60|unique:bank',
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
        Gate::authorize('admin-only');
        $notaris = Notaris::all();
        return view('bank.edit', compact('bank', 'notaris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bank $bank)
    {
        Gate::authorize('admin-only');
        $input = $request->validate([
            'nama_bank' => ['required', 'max:60', Rule::unique('bank', 'nama_bank')->ignore($bank->id)],
            'alamat_bank' => 'required|max:100',
            'no_telp_bank' => ['required', 'max:13', 'regex:/^(08|07)[0-9]{8,11}$/'],
            'notaris_id' => 'required|exists:notaris,id'
        ]);

        $bank->update($input);
        return redirect()->route('bank.index')->with('success', 'Data Bank Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bank $bank)
    {
        Gate::authorize('admin-only');
        try {
            $bank->delete();
            return redirect()->route('bank.index')->with('success', 'Data Bank Berhasil Dihapus');
        }catch (\Exception $e) {
            return redirect()->route('bank.index')->with('error', 'Gagal menghapus Data Bank.');
        }
    }
}
