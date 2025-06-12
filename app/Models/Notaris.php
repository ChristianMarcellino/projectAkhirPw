<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Notaris extends Model
{
    protected $table = "notaris";
    use hasUuids;
    protected $fillable = ['nik_notaris', 'nama_notaris', 'alamat_notaris', 'no_telp_notaris'];
}
