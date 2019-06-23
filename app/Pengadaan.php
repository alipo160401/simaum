<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    protected $guarded = [
        'id',
    ];
    public function vendor()
    {
        return $this->belongsTo('App\Vendor', 'id_vendor');
    }
    public function detail_pengadaan()
    {
        return $this->hasMany('App\DetailPengadaan', 'id_pengadaan');
    }
}
