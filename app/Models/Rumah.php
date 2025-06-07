<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{
    protected $table ='rumah';
    use HasUuids;

    public function proyek(){
        return $this->belongsTo(Proyek::class, 'proyek_id', 'id');
    }
    protected $fillable = ['no_shm_rumah','blok_rumah','harga_dp','proyek_id','kelebihan_tanah','status_rumah'];
}
