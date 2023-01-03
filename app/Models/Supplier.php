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
 * Class Supplier
 * 
 * @property int $id
 * @property string $name
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Obat[] $obats
 *
 * @package App\Models
 */
class Supplier extends Model
{
	use SoftDeletes;
	protected $table = 'supplier';

	protected $fillable = [
		'name'
	];

	public function obats()
	{
		return $this->hasMany(Obat::class);
	}
}
