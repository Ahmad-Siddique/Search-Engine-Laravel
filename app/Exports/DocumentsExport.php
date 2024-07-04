<?php

namespace App\Exports;

use App\Models\Documents;
use Maatwebsite\Excel\Concerns\FromCollection;

class DocumentsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Documents::all();
    }
}
