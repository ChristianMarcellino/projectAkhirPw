<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class BiChecking extends Model
{
    protected $table = 'bi_checking';
    use hasUuids;
    protected $fillable = [
        'id_checking',
        'konsumen_id',
        'hasil_checking',
        'tanggal_checking',
    ];

    public function konsumen()
    {
        return $this->belongsTo(Konsumen::class, 'konsumen_id', 'id');
    }
}
