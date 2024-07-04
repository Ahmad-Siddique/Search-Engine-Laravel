<?php

namespace App\Exports;

use App\Models\Gallery;
use Maatwebsite\Excel\Concerns\FromCollection;

class GalleriessExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Gallery::all();
    }
}
