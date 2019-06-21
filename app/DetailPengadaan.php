<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPengadaan extends Model
{
    protected $guarded = [
        'id',
    ];
    public function pengadaan()
    {
        return $this->belongsTo('App\Pengadaan');
    }
}
