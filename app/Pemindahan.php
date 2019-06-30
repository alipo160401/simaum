<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemindahan extends Model
{
    protected $guarded = [
        'id',
    ];
    public function asset()
    {
        return $this->belongsTo('App\Asset', 'id_asset');
    }
    public function ruang()
    {
        return $this->belongsTo('App\Ruang', 'id_ruang');
    }
    public function detail_pemindahan()
    {
        return $this->hasMany('App\DetailPemindahan', 'id_pemindahan');
    }
}
