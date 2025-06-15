<?php

namespace App\Http\Controllers;

use App\Models\BerkasKonsumen;
use App\Models\JenisBerkas;
use App\Models\Konsumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BerkasKonsumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berkasKonsumen = BerkasKonsumen::all();
        $jenisBerkas = JenisBerkas::all();
        return view('berkas_konsumen.index', compact('berkasKonsumen','jenisBerkas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $konsumen = Konsumen::all();
        $jenisBerkas = JenisBerkas::all();
        return view('berkas_konsumen.create', compact( 'konsumen', 'jenisBerkas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $input = $request->validate([
            'konsumen_id' => 'required|exists:konsumen,id',
            'ketersediaan_berkas' => 'required|in:Tersedia,Belum Tersedia',
            'keterangan_berkas' => 'required',
            'berkas_id' => 'required|exists:jenis_berkas,id'
        ]);

        BerkasKonsumen::create($input);
        return redirect()->route('berkas_konsumen.index')->with('success', 'Data Berkas Konsumen Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(BerkasKonsumen $berkasKonsumen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BerkasKonsumen $berkasKonsumen)
    {
        Gate::authorize('admin-only');
        $konsumen = Konsumen::all();
        $jenisBerkas = JenisBerkas::all();
        return view('berkas_konsumen.edit', compact('berkasKonsumen', 'konsumen','jenisBerkas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BerkasKonsumen $berkas_konsumen)
    {
        Gate::authorize('admin-only');
        $input = $request->validate([
            'konsumen_id' => 'required|exists:konsumen,id',
            'ketersediaan_berkas' => 'required|in:Tersedia,Belum Tersedia',
            'keterangan_berkas' => 'required',
            'berkas_id' => 'required|exists:jenis_berkas,id'
        ]);

        $berkas_konsumen->update($input);
        return redirect()->route('berkas_konsumen.index')->with('success', 'Data Berkas Konsumen Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BerkasKonsumen $berkasKonsumen)
    {
        Gate::authorize('admin-only');
        try {
            $berkasKonsumen->delete();
            return redirect()->route('berkas_konsumen.index')->with('success', 'Data Berkas Konsumen Berhasil Dihapus');
        }catch (\Exception $e) {
            return redirect()->route('berkas_konsumen.index')->with('error', 'Gagal menghapus Data Berkas Konsumen.');
        }
    }
}
