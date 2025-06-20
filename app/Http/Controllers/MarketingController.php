<?php

namespace App\Http\Controllers;

use App\Models\Marketing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

class MarketingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marketing = Marketing::paginate(10);
        return view('marketing.index', compact('marketing'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('marketing.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'nik_marketing' => 'max:16|required|unique:marketing',
            'nama_marketing' => 'max:50|required',
            'no_telp_marketing' => ['required', 'max:13', 'regex:/^(08|07)[0-9]{8,11}$/'],
            'tanggal_masuk' => 'required'
        ]);

        Marketing::create($input);
        return redirect()->route('marketing.index')->with('success', 'Data Marketing Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Marketing $marketing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marketing $marketing)
    {
        Gate::authorize('admin-only');
        return view('marketing.edit', compact('marketing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marketing $marketing)
    {
        Gate::authorize('admin-only');
        $input = $request->validate([
            'nik_marketing' => ['max:16','required',Rule::unique('marketing', 'nik_marketing')->ignore($marketing->id)],
            'nama_marketing' => 'max:50|required',
            'no_telp_marketing' => ['required', 'max:13', 'regex:/^(08|07)[0-9]{8,11}$/'],
            'tanggal_masuk' => 'required'
        ]);

        $marketing->update($input);
        return redirect()->route('marketing.index')->with('success', 'Data Marketing Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marketing $marketing)
    {
        Gate::authorize('admin-only');
        try {
            $marketing->delete();
            return redirect()->route('marketing.index')->with('success', 'Data Marketing Berhasil Dihapus');
        }catch (\Exception $e) {
            return redirect()->route('marketing.index')->with('error', 'Gagal menghapus Data Marketing.');
        }
    }
}
