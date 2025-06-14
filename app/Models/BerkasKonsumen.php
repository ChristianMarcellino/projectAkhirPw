<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class BerkasKonsumen extends Model
{
    protected $table = 'bi_checking';
    use HasUuids;
    protected $fillable = [
        
        'konsumen_id',
        'ketersediaan_berkas',
        'keterangan_berkas',
        'berkas_id',
    ];

    public function konsumen()
    {
        return $this->belongsTo(konsumen::class, 'konsumen_id', 'id');
    }
    public function jenisBerkas()
    {
        return $this->belongsTo(JenisBerkas::class, 'berkas_id', 'id');
    }
}
