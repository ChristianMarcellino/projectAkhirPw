<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DashboardController extends Controller
{
    public function index(){

        $rumahTerjual = DB::select('select count(*) as jumlah From rumah where status_penjualan != "tersedia" group by "proyek_id"');

        $rumahTersedia = DB::table('rumah')
        ->select('proyek_id',DB::raw('count(*) as jumlah'))
        ->where('status_penjualan','=', 'Tersedia')
        ->groupBy('proyek_id')
        ->get();

        $namaProyek = DB::table('proyek')
        ->select('nama_proyek')
        ->get();

        return view('dashboard.index', compact('rumahTerjual', 'namaProyek', 'rumahTersedia'));
    } 
}
