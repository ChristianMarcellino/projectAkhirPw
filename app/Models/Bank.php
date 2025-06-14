<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = "bank";
    use HasUuids;
    protected $fillable = ['nama_bank', 'alamat_bank', 'no_telp_bank', 'notaris_id'];

    public function notaris()
    {
        return $this->belongsTo(Notaris::class, 'notaris_id', 'id');
    }
}
