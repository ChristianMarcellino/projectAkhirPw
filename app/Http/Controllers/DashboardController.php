<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $rumahTersedia =DB::select('select nama_proyek,count(*) as jumlah from rumah 
        JOIN proyek on proyek_id = proyek.id 
        where status_penjualan = "Tersedia" 
        group by nama_proyek;');

        return view('dashboard.index', compact('rumahTersedia'));
    }
}
