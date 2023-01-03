<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Membership
 * 
 * @property int $id
 * @property string|null $jenis
 * @property int|null $batas_poin
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Membership extends Model
{
	protected $table = 'membership';
	public $timestamps = false;

	protected $casts = [
		'batas_poin' => 'int'
	];

	protected $fillable = [
		'jenis',
		'batas_poin'
	];

	public function users()
	{
		return $this->hasMany(User::class);
	}

	public static function convertPoin($harga){
		$poin = floor($harga/10000);
		return $poin;
	}
}
