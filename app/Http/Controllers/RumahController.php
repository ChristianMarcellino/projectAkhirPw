<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

class RumahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = Rumah::query();
        if($request->filled('status_penjualan')){
            $query->where('status_penjualan',$request->status_penjualan);
        }
        if ($request->filled('proyek_id')) {
        $query->where('proyek_id', $request->proyek_id);
        }
        if($request->filled('blok_rumah')){
            $query->where('blok_rumah', 'LIKE', '%' . $request->blok_rumah .     '%');
        }

        $rumah= $query->paginate(10);
        $proyek = Proyek::all();
        return view ('rumah.index', compact('proyek','rumah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proyek = \App\Models\Proyek::all();
        return view('rumah.create', compact('proyek'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'no_shm_rumah'     => 'required|max:16|unique:rumah',
            'blok_rumah'       =>
            ['required',
            'max:5',
            Rule::unique('rumah')
                ->where(fn ($query) => $query->where('proyek_id', $request->proyek_id))
            ],
            'harga_dp'         => 'required|max:2000000000',
            'luas_tanah_rumah'  => 'required',
            'status_penjualan'     => 'required|in:Tersedia,Booking,Terjual',
            'proyek_id'        => 'required|exists:proyek,id',
        ]);

        Rumah::create($input);
        return redirect()->route('rumah.index')->with('success', 'Data Rumah Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rumah $rumah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rumah $rumah)
    {
        Gate::authorize('admin-only');
        $proyek = \App\Models\Proyek::all();
        return view('rumah.edit',compact('rumah','proyek'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rumah $rumah)
    {
        Gate::authorize('admin-only');
        $input = $request->validate([
            'no_shm_rumah'     =>['required','max:16',Rule::unique('rumah', 'no_shm_rumah')->ignore($rumah->id)],
            'blok_rumah'       =>['required','max:5',
            Rule::unique('rumah')
                ->where(fn ($query) => $query->where('proyek_id', $request->proyek_id))->ignore($rumah->id)],
            'harga_dp'         => 'required|max:2000000000',
            'luas_tanah_rumah'  => 'required',
            'status_penjualan'  => 'required|in:Tersedia,Booking,Terjual',
            'proyek_id' => 'required|exists:proyek,id',
        ]);

        $rumah->update($input);
        return redirect()->route('rumah.index')->with('success', 'Data Rumah Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rumah $rumah)
    {
        Gate::authorize('admin-only');
        try {
            $rumah->delete();
            return redirect()->route('rumah.index')->with('success', 'Data Rumah Berhasil Dihapus');
        }catch (\Exception $e) {
            return redirect()->route('rumah.index')->with('error', 'Gagal menghapus Data Rumah.');
        }
    }
}
