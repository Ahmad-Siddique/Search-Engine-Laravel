<?php

namespace App\Exports;

use App\Models\Documents;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class KeywordExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DB::table("search_history")->orderBy('created_at', 'desc')->get();
    }
}
