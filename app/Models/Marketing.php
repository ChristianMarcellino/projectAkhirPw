<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Marketing extends Model
{
    protected $table ="marketing";
    use HasUuids;
    protected $fillable =['nik_marketing', 'nama_marketing', 'no_telp_marketing','tanggal_masuk'];
}
