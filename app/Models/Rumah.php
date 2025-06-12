<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{
    protected $table ='rumah';

    public function proyek(){
        return $this->belongsTo(Proyek::class, 'proyek_id', 'id');
    }

    use HasUuids;
    protected $fillable = ['no_shm_rumah','blok_rumah','luas_tanah_rumah','harga_dp','proyek_id','status_penjualan'];
}
