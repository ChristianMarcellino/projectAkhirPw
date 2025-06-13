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
        'no_telp',
        'alamat',
        'gaji',
        'status_pernikahan',
        'no_shm_rumah',
        'nama_bank',
        'nik_marketing',
    
    ];
    public function rumah()
    {
        return $this->belongsTo(Rumah::class, 'no_shm_rumah', 'no_shm_rumah');
    }
    public function marketing()
    {
        return $this->belongsTo(Marketing::class, 'nik_marketing', 'nik_marketing');
    }
    public function bank()
    {
        return $this->belongsTo(Bank::class, 'nama_bank', 'nama_bank');
    }
}
