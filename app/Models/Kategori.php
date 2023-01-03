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
 * Class Kategori
 * 
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Obat[] $obats
 *
 * @package App\Models
 */
class Kategori extends Model
{
	use SoftDeletes;
	protected $table = 'kategori';

	protected $fillable = [
		'name'
	];

	public function obats()
	{
		return $this->hasMany(Obat::class);
	}
}
