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

}
