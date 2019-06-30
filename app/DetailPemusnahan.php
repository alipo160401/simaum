<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPemusnahan extends Model
{
    protected $guarded = [
        'id',
    ];

    public function pemusnahan()
    {
        return $this->belongsTo('App\Pemusnahan', 'id_pemusnahan');
    }

    public function asset()
    {
        return $this->belongsTo('App\Asset', 'id_asset');
    }
}
