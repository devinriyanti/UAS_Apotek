<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TransaksiObat
 * 
 * @property int $obat_id
 * @property int $transaksi_id
 * @property int $kuantitas
 * @property float|null $harga
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Obat $obat
 * @property Transaksi $transaksi
 *
 * @package App\Models
 */
class TransaksiObat extends Model
{
	protected $table = 'transaksi_obat';
	public $incrementing = false;

	protected $casts = [
		'obat_id' => 'int',
		'transaksi_id' => 'int',
		'kuantitas' => 'int',
		'harga' => 'float'
	];

	protected $fillable = [
		'obat_id',
		'transaksi_id',
		'kuantitas',
		'harga'
	];

	public function obat()
	{
		return $this->belongsTo(Obat::class);
	}

	public function transaksi()
	{
		return $this->belongsTo(Transaksi::class);
	}
}
