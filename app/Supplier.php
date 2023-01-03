<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;
    protected $table = 'supplier';
    public function obat()
    {
        return $this->belongsTo('App\Obat', 'supplier_id', 'id');
    }
}
