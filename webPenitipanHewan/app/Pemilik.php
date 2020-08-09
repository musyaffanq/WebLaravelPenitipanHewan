<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
    protected $table = 'pemilik';

    protected $fillable = [
        'nama_pemilik',
        'nomor_telepon',
        'batas_waktu_titip',
        'alamat',
    ];

    public function getNamaPemilikAttribute($nama_pemilik){
        return ucwords($nama_pemilik);
    }

    public function setNamaPemilikAttribute($nama){
        $this->attributes['nama_pemilik'] = strtolower($nama);
        return $nama;
    }

    public function hewan()
    {
        return $this->belongsToMany('App\Hewan', 'hewan_pemilik', 'id_pemilik', 'id_hewan')->withTimeStamps()->withPivot('jenis_kelamin', 'nama_hewan','foto');
    }
}
