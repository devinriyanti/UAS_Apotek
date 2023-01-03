<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaksi
 * 
 * @property int $id
 * @property Carbon $tanggal_transaksi
 * @property float|null $total
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $users_id
 * 
 * @property User $user
 * @property Collection|Obat[] $obats
 *
 * @package App\Models
 */
class Transaksi extends Model
{
	protected $table = 'transaksi';

	protected $casts = [
		'total' => 'float',
		'users_id' => 'int'
	];

	protected $dates = [
		'tanggal_transaksi'
	];

	protected $fillable = [
		'tanggal_transaksi',
		'total',
		'users_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}

	public function obat()
	{
		return $this->belongsToMany(Obat::class, 'transaksi_obat', 'transaksi_id', 'obat_id')
					->withPivot('kuantitas', 'harga');
					
	}

	public function tambahObat($cart, $user)
    {
        $total = 0;
        foreach ($cart as $id => $details) {
            $total += $details['quantity'] * $details['price'];
            $this->obat()->attach($id, ['kuantitas' => $details['quantity'], 'harga' => $details['price'] * $details['quantity']]);
        }
        return $total;
    }
}
