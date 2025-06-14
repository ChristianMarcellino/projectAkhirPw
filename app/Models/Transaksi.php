<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;


class Transaksi extends Model
{
    //
    use HasUuids;
    protected $table = 'transaksis';
    protected $fillable = ['jenis_transaksi','tanggal_transaksi','jumlah_pembayaran','jenis_pembayaran','id_konsumen'];
    protected $casts = [
        'tanggal_transaksi' => 'date',
    ];
    public function konsumen()
    {
        return $this->belongsTo(Konsumen::class, 'id_konsumen', 'id');
    }
}
