<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    protected $table = 'proyek';
    protected $primaryKey = 'no_pbg';
    public $incrementing = false;
    protected $keyType = 'string'; 
    protected $fillable = ['no_pbg', 'nama_proyek', 'jumlah_unit', 'harga_rumah','luas_tanah', 'harga_kelebihan_tanah', 'alamat'];
}
