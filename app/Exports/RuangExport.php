<?php

namespace App\Exports;

use App\Ruang;
use Maatwebsite\Excel\Concerns\FromCollection;

class RuangExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ruang::all();
    }
}
