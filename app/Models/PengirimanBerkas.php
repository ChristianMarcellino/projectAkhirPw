<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class PengirimanBerkas extends Model
{
    //
    use HasUuids;
    protected $table = 'pengiriman_berkas';
    protected $fillable = ['id_konsumen', 'id_bank', 'id_marketing', 'tanggal_kirim', 'status'];
    protected $casts = [
        'tanggal_kirim' => 'date',
    ];
    public function konsumen()
    {
        return $this->belongsTo(Konsumen::class, 'id_konsumen', 'id');
    }
    public function bank()
    {
        return $this->belongsTo(Bank::class, 'id_bank', 'id');
    }
    public function marketing()
    {
        return $this->belongsTo(Marketing::class, 'id_marketing', 'id');
    }
}