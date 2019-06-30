<?php

namespace App\Exports;

use App\Gedung;
use Maatwebsite\Excel\Concerns\FromCollection;

class GedungExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Gedung::all();
    }
}
