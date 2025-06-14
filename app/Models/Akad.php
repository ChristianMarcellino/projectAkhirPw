<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Akad extends Model
{
     protected $table = "akads";
    use HasUuids;
    protected $fillable = ['id_akad', 'konsumen_id', 'tanggal_akad', 'tempat_akad'];

    public function konsumen()
    {
        return $this->belongsTo(konsumen::class, 'konsumen_id', 'id');
    }
}
