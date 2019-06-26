<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPemeliharaan extends Model
{
    protected $guarded = [
        'id',
    ];

    public function pemeliharaanRutin()
    {
        return $this->belongsTo('App\PemeliharaanRutin', 'id_pemeliharaan_rutin');
    }

    public function asset()
    {
        return $this->belongsTo('App\Asset', 'id_asset');
    }
}
