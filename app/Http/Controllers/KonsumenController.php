<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use App\Models\Rumah;
use App\Models\Marketing;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KonsumenController extends Controller
{
    public function index(Request $request)
    {
        $rumah = Rumah::all();
        $marketing = Marketing::all();

        return view('konsumen.index', compact('konsumen', 'rumah', 'marketing'));
    }
    public function create()
    {
        //

        return view('konsumen.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Konsumen $konsumen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Konsumen $konsumen)
    {
        //
    }
}
