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
            "Qualification" => $row[2],
            "Brief_Specs" => $row[3],
            "Function" => $row[4],
            "Origin" => $row[5],
            "Currency" => $row[6],
            "Price_Min" => floatval($row[7]),
            "Price_Max" => floatval($row[8]),
            "Unit" => $row[9],
            "Discount" => floatval($row[10]),
            "Monthly_Trend" => floatval($row[11]),
            "Availability" => $row[12],
            "Alternate" => $row[13],
            "Alternate_CSI" => $row[14],
            
            "Notes" => $row[15],
            "Keywords" => $row[16],
            "Photo" => $row[17]
            // "Photo" => $row[18],
        ]);
    }
}
