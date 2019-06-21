<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPerbaikan extends Model
{
    protected $guarded = [
        'id',
    ];

    public function perbaikan()
    {
        return $this->belongsTo('App\Perbaikan');
    }

    public function asset()
    {
        return $this->belongsTo('App\Asset');
    }
}
