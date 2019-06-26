<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perbaikan extends Model
{
    protected $guarded = [
        'id',
    ];
    public function vendor()
    {
        return $this->belongsTo('App\Vendor', 'id_vendor');
    }
    public function detail_perbaikan()
    {
        return $this->hasMany('App\DetailPerbaikan', 'id_perbaikan');
    }
    public function asset()
    {
        return $this->belongsTo('App\Asset', 'id_asset');
    }
}
