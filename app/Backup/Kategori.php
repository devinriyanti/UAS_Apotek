<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use SoftDeletes;
    protected $table = 'kategori';
    public function obat()
    {
        return $this->belongsTo('App\Obat', 'kategori_id', 'id');
    }
}
