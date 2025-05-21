<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    protected $table = 'proyek';
    use HasUuids;
    protected $fillable = ['no_pbg', 'nama_proyek', 'jumlah_unit', 'harga_rumah','luas_tanah'];
}
