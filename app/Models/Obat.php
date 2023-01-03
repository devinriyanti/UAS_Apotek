<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Obat
 * 
 * @property int $id
 * @property string $nama_obat
 * @property string $formula
 * @property string $restriction_formula
 * @property string $deskripsi
 * @property bool $faskes_tk1
 * @property bool $faskes_tk2
 * @property bool $faskes_tk3
 * @property float|null $harga
 * @property string|null $gambar
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int $kategori_id
 * @property int $supplier_id
 * 
 * @property Kategori $kategori
 * @property Supplier $supplier
 * @property Collection|Transaksi[] $transaksis
 *
 * @package App\Models
 */
class Obat extends Model
{
	use SoftDeletes;
	protected $table = 'obat';

	protected $casts = [
		'faskes_tk1' => 'bool',
		'faskes_tk2' => 'bool',
		'faskes_tk3' => 'bool',
		'harga' => 'float',
		'kategori_id' => 'int',
		'supplier_id' => 'int'
	];

	protected $fillable = [
		'nama_obat',
		'formula',
		'restriction_formula',
		'deskripsi',
		'faskes_tk1',
		'faskes_tk2',
		'faskes_tk3',
		'harga',
		'gambar',
		'kategori_id',
		'supplier_id'
	];

	public function kategori()
	{
		return $this->belongsTo(Kategori::class);
	}

	public function supplier()
	{
		return $this->belongsTo(Supplier::class);
	}

	public function transaksis()
	{
		return $this->belongsToMany(Transaksi::class, 'transaksi_obat')
					->withPivot('kuantitas', 'harga')
					->withTimestamps();
	}
}
