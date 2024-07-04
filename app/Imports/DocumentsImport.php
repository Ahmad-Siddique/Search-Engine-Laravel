<?php

namespace App\Imports;

use App\Models\Resource;
use App\Models\Documents;
use Maatwebsite\Excel\Concerns\ToModel;

class DocumentsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // return new Material([
        //     "CSI"=> $row['CSI'],
        //     "Description" => $row["Description"],
        //     "Qualification" => $row["Qualification"],
        //     "Brief_Specs" => $row["Brief_Specs"],
        //     "Function" => $row["Function"],
        //     "Origin" => $row["Origin"],
        //     "Currency" => $row["Currency"],
        //     "Price_Min" => $row["Price_Min"],
        //     "Price_Max" => $row["Price_Max"],
        //     "Unit" => $row["Unit"],
        //     "Discount" => $row["Discount"],
        //     "Monthly_Trend" => $row["Monthly_Trend"],
        //     "Availability" => $row["Availability"],
        //     "Alternate" => $row["Alternate"],
        //     "Alternate_CSI" => $row["Alternate_CSI"],

        //     "Notes" => $row["Notes"],
        //     "Keywords" => $row["Keywords"],
        //     "Photo" => $row["Photo"],
        // ]);

        // dd($row);
        return new Documents([
            "CSI" => $row[0],
            "Description" => $row[1],
            "Keywords" => $row[2],
            "File" => $row[3],
        ]);
    }
}
