<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use App\Models\Rumah;
use App\Models\Bank;
use App\Models\Marketing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

class KonsumenController extends Controller
{
    public function index(Request $request)
    {
        $query = Konsumen::query();
        if($request->filled('nama_konsumen')){
            $query->where('nama_konsumen', 'LIKE', '%' . $request->nama_konsumen . '%');
        }
        if($request->filled('marketing_id')){
            $query->where('marketing_id',$request->marketing_id);
        }
        if($request->filled('status_pernikahan')){
            $query->where('status_pernikahan',$request->status_pernikahan);
        }
        if($request->filled('gaji')){
            $query->where('gaji', '>=', $request->gaji);
        }
        $konsumen = $query->paginate(10);
        $marketing = Marketing::all();
        return view('konsumen.index', compact('konsumen', 'marketing'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rumah = Rumah::all();
        $bank = Bank::all();
        $marketing = Marketing::all();
        return view('konsumen.create', compact('rumah', 'bank', 'marketing'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'nik_konsumen' => 'max:16|required|unique:konsumen',
            'nama_konsumen' => 'max:60|required',
            'no_telp_konsumen' => ['required', 'max:13', 'regex:/^(08|07)[0-9]{8,11}$/'],
            'alamat_konsumen' => 'max:100|required',
            'gaji' => 'required|integer|min:0|max:2000000000',
            'status_pernikahan' => 'required|in:Menikah,Cerai Hidup,Cerai Mati,Belum Menikah',
            'rumah_id' => 'required|exists:rumah,id|unique:konsumen',
            'bank_id' => 'required|max:60|exists:bank,id',
            'marketing_id' => 'required|exists:marketing,id'
        ]);

        Konsumen::create($input);
        return redirect()->route('konsumen.index')->with('success', 'Data Konsumen Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Konsumen $konsumen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Konsumen $konsumen)
    {
        Gate::authorize('admin-only');
        $rumah = Rumah::all();
        $bank = Bank::all();
        $marketing = Marketing::all();
        return view('konsumen.edit', compact('konsumen', 'rumah', 'bank', 'marketing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Konsumen $konsumen)
    {
        Gate::authorize('admin-only');
        $input = $request->validate([
            'nik_konsumen' => ['max:16', 'required', Rule::unique('konsumen', 'nik_konsumen')->ignore($konsumen->id)],
            'nama_konsumen' => 'max:60|required',
            'no_telp_konsumen' => ['required', 'max:13', 'regex:/^(08|07)[0-9]{8,11}$/'],
            'alamat_konsumen' => 'max:100|required',
            'gaji' => 'required|integer|min:0|max:2000000000',
            'status_pernikahan' => 'required|in:Menikah,Cerai Hidup,Cerai Mati,Belum Menikah',
            'rumah_id' => 'required|exists:rumah,id|unique:konsumen',
            'bank_id' => 'required|max:60|exists:bank,id',
            'marketing_id' => 'required|exists:marketing,id'
        ]);
        $konsumen->update($input);
        return redirect()->route('konsumen.index')->with('success', 'Data Konsumen Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Konsumen $konsumen)
    {
        Gate::authorize('admin-only');
        try {
            $konsumen->delete();
            return redirect()->route('konsumen.index')->with('success', 'Data Konsumen Berhasil Dihapus');
        }catch (\Exception $e) {
            return redirect()->route('konsumen.index')->with('error', 'Gagal menghapus Data Konsumen.');
        }
    }
}
