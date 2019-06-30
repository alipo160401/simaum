<?php

namespace App\Exports;

use App\Tanah;
use Maatwebsite\Excel\Concerns\FromCollection;

class TanahExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tanah::all();
    }
}
