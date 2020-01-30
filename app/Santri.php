<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    protected $table = 'santri';
    protected $fillable = [
        'id',
        'user_NIM',
        'tempat_lahir',
        'tgl_lahir',
        'jk',
        'anake_ke',
        'alamat',
        'no_hp',
        'sosial_media',
        'asal_sekolah',
        'gambar',
        'kamar_id',
        'smester_id',
        'prodi_id',
        'awal_mondok',
        'status',
        'madrasah_id',
        'kls_id'
    ];

    public function kamar()
    {
        return $this->belongsTo('App\Kamar');
    }

    public function smester()
    {
        return $this->belongsTo('App\Smester');
    }

    public function prodi()
    {
        return $this->belongsTo('App\Prodi');
    }

    public function ortu()
    {
        return $this->hasMany('App\Ortu', 'users_NIM', 'user_NIM');
    }
    public function user()
    {
        return $this->belongsTo('App\Santri', 'user_NIM', 'NIM');
    }
    public function kls()
    {
        return $this->belongsTo('App\Madrasah\Kls');
    }
    public function madrasah()
    {
        return $this->belongsTo('App\Madrasah\Madrasah');
    }
}
