<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PemeliharaanRutin extends Model
{
    protected $guarded = [
        'id',
    ];
    public function vendor()
    {
        return $this->belongsTo('App\Vendor', 'id_vendor');
    }
    public function detail_pemeliharaan()
    {
        return $this->hasMany('App\DetailPemeliharaan', 'id_pemeliharaan_rutin');
    }
    public function asset()
    {
        return $this->belongsTo('App\Asset', 'id_asset');
    }
}
