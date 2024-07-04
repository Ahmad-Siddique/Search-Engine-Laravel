<?php

namespace App\Imports;

use App\Models\Material;
use Maatwebsite\Excel\Concerns\ToModel;

class MaterialsImport implements ToModel
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
        return new Material([
            "CSI" => $row[0],
            "Description" => $row[1],
            // "Qualification" => $row[2],
            "Brief_Specs" => $row[2],
            "Function" => $row[3],
            "Origin" => $row[4],
            "Currency" => $row[5],
            "Price_Min" => floatval($row[6]),
            "Price_Max" => floatval($row[7]),
            "Unit" => $row[8],
            "Discount" => floatval($row[9]),
            "Monthly_Trend" => floatval($row[10]),
            "Availability" => $row[11],
            "Alternate" => $row[12],
            "Alternate_CSI" => $row[13],
            
            "Notes" => $row[14],
            "Keywords" => $row[15],
            "Photo" => $row[16]
            // "Photo" => $row[18],
        ]);
    }
}
