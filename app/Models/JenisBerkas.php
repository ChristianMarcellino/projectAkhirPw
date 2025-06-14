<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class JenisBerkas extends Model
{
    protected $table ="jenis_berkas";
    use HasUuids;
    protected $fillable =['jenis_Berkas'];
}
