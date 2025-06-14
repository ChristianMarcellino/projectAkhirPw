<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Konsumen;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('konsumen')->latest()->get();
        return view('transaksi.index', compact('transaksi'));
    }


    public function create()
    {
        $konsumen = Konsumen::all();
        return view('transaksi.create', compact('konsumen'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'jenis_transaksi' => 'required|string|max:60',
            'tanggal_transaksi' => 'required|date',
            'jumlah_pembayaran' => 'required|integer|min:0',
            'jenis_pembayaran' => 'required|in:tunai,transfer',
            'id_konsumen' => 'required|exists:konsumen,id',
        ]);

        Transaksi::create($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Data Transaksi berhasil ditambahkan.');
    }


    public function show(Transaksi $transaksi)
    {
        
    }

    public function edit(Transaksi $transaksi)
    {
        $konsumen = Konsumen::all();
        return view('transaksi.edit', compact('transaksi', 'konsumen'));
    }


    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'jenis_transaksi' => 'required|string|max:60',
            'tanggal_transaksi' => 'required|date',
            'jumlah_pembayaran' => 'required|integer|min:0',
            'jenis_pembayaran' => 'required|in:tunai,transfer',
            'id_konsumen' => 'required|exists:konsumen,id',
        ]);

        $transaksi->update($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Data Transaksi berhasil diperbarui.');
    }


    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Data Transaksi berhasil dihapus.');
    }
}