<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ortu extends Model
{
	protected $table = 'ortu';
	protected $fillable = [
		'users_NIM',
		'nama_ayah',
		'nama_ibu',
		'tgl_lahir',
		'agama',
		'pengamal',
		'negara',
		'pendidikan_akhir',
		'jurusan',
		'alamat',
		'no_hp',
		'pekerjaan',
		'penghasilan',
		'gambar'
	];

	public function santri()
	{
		return $this->belongsTo('App\Santri', 'users_NIM', 'user_NIM');
	}
}
