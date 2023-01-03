<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Obat extends Model
{
    protected $table = 'obat';
    use SoftDeletes;
    public function kategori()
    {
        return $this->hasMany('App\Kategori', 'kategori_id');
    }
    public function supplier()
    {
        return $this->hasMany('App\Supplier', 'supplier_id');
    }
    public function transaksi()
    {
        return $this->belongsToMany('App\Transaksi', 'transaksi_obat', 'obat_id', 'transaksi_id')->withPivot('kuantitas', 'harga');
    }
}
