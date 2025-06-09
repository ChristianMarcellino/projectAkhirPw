<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{
    protected $table ='rumah';
    protected $primaryKey = 'no_shm_rumah';
    public $incrementing = false;
    protected $keyType = 'string'; 

    public function proyek(){
        return $this->belongsTo(Proyek::class, 'no_pbg', 'no_pbg');
    }
    protected $fillable = ['no_shm_rumah','blok_rumah','luas_tanah_rumah','harga_dp','no_pbg','status_penjualan'];
}
