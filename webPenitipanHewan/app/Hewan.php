<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hewan extends Model
{
    protected $table = 'hewan';

    protected $fillable = ['jenis_hewan'];

    public function pemilik() {
        return $this->belongsToMany('App\Pemilik', 'hewan_pemilik','id_hewan','id_pemilik');
    }
}
