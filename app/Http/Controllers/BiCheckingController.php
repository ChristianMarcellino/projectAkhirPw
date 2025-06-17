<?php

namespace App\Http\Controllers;

use App\Models\BiChecking;
use App\Models\Konsumen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class BiCheckingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $biChecking = BiChecking::paginate(10);
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
            'konsumen_id' => 'required|exists:konsumen,id|unique:bi_checking',
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
        Gate::authorize('admin-only');
        $konsumen = Konsumen::all();
        return view('bi_checking.edit', compact('biChecking', 'konsumen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BiChecking $bi_checking)
    {
        Gate::authorize('admin-only');
        $input = $request->validate([
            'konsumen_id' => ['required','exists:konsumen,id', Rule::unique('bi_checking','konsumen_id')->ignore($bi_checking->id)],
            'hasil_checking' => 'required|in:kol 1,kol 2,kol 3,kol 4,kol 5',
            'tanggal_checking' => 'required|date',
        ]);

        $bi_checking->update($input);
        return redirect()->route('bi_checking.index')->with('success', 'Data Bi Checking Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BiChecking $biChecking)
    {
        Gate::authorize('admin-only');
        try {
            $biChecking->delete();
            return redirect()->route('bi_checking.index')->with('success', 'Data Bi Checking Berhasil Dihapus');
        }catch (\Exception $e) {
            return redirect()->route('bi_checking.index')->with('error', 'Gagal menghapus Data Bi Checking.');
        }
    }
}
