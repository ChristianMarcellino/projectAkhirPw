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

        $detailChecking = DB::select('select hasil_checking,COUNT(*) AS jumlah_konsumen FROM bi_checking
        GROUP BY hasil_checking
        ORDER BY jumlah_konsumen DESC;');

        $konsumenKeBank = DB::select('select bank.nama_bank,count(*) AS jumlah from konsumen
        JOIN bank ON konsumen.bank_id = bank.id
        GROUP BY bank.nama_bank');

        $statusKonsumen = DB::select('select status_pernikahan, count(*) as jumlah_konsumen from konsumen
        group by status_pernikahan;');

        return view('dashboard.index', compact('rumahTersedia','detailChecking', 'konsumenKeBank','statusKonsumen'));
    }
}
