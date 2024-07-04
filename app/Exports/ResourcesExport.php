<?php

namespace App\Exports;

use App\Models\Resource;
use Maatwebsite\Excel\Concerns\FromCollection;

class ResourcesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Resource::all();
    }
}
