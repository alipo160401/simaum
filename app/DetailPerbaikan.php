<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPerbaikan extends Model
{
    protected $guarded = [
        'id',
    ];

    public function Perbaikan()
    {
        return $this->belongsTo('App\PemeliharaanRutin', 'id_perbaikan');
    }

    public function asset()
    {
        return $this->belongsTo('App\Asset', 'id_asset');
    }
}
