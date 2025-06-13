<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class PengirimanBerkas extends Model
{
    //
    use HasUuids;
    protected $table = 'pengiriman_berkas';
    protected $fillable = [
        'id',
        'nik_konsumen',
        'nama_bank',
        'nik_marketing',
        'tanggal_kirim',
        'status'
    ];
    protected $casts = [
        'tanggal_kirim' => 'date',
    ];
    public function konsumen()
    {
        return $this->belongsTo(Konsumen::class, 'nik_konsumen', 'nik');
    }
    public function bank()
    {
        return $this->belongsTo(Bank::class, 'nama_bank', 'id');
    }
    public function marketing()
    {
        return $this->belongsTo(Marketing::class, 'nik_marketing', 'nik');
    }
}
