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

        $detailAkad = DB::select('select tanggal_akad,tempat_akad,nama_konsumen,nama_proyek,blok_rumah from akad
        join konsumen on akad.konsumen_id = konsumen.nik_konsumen
        join rumah on konsumen.rumah_id = rumah.no_shm_rumah
        join proyek on rumah.proyek_id = proyek.no_pbg
        where tanggal_akad > now()');

        return view('dashboard.index', compact('rumahTersedia','detailAkad'));
    }
}
