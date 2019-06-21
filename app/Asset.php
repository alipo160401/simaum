<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $guarded = [
        'id',
    ];

    public function ruang()
    {
        return $this->belongsTo('App\Ruang', 'id_ruang');
    }
}
