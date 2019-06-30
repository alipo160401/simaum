<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemusnahan extends Model
{
    protected $guarded = [
        'id',
    ];

    public function asset()
    {
        return $this->belongsTo('App\Asset', 'id_asset');
    }

    public function detail_pemusnahan()
    {
        return $this->hasMany('App\DetailPemusnahan', 'id_pemusnahan');
    }
}
