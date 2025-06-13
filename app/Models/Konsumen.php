<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Concerns\HasUuids;

class Konsumen extends Model
{
    //
    use HasUuids;
    protected $table = 'konsumen';
    protected $fillable = [
        'nik_konsumen',
        'nama_konsumen',
        'no_telp_konsumen',
        'alamat_konsumen',
        'gaji',
        'status_pernikahan',
        'rumah_id',
        'bank_id',
        'marketing_id',

    ];
    public function rumah()
    {
        return $this->belongsTo(Rumah::class, 'rumah_id', 'id');
    }
    public function marketing()
    {
        return $this->belongsTo(Marketing::class, 'marketing_id', 'id');
    }
    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id', 'id');
    }
}
