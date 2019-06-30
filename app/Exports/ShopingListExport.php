<?php

namespace App\Exports;

use App\ShopingList;
use Maatwebsite\Excel\Concerns\FromCollection;

class ShopingListExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ShopingList::all();
    }
}
