<?php

namespace App\Imports;

use App\Models\Resource;
use App\Models\Equipment;
use Maatwebsite\Excel\Concerns\ToModel;

class EquipmentsImport implements ToModel
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
        return new Equipment([
            "CSI" => $row[0],
            "Description" => $row[1],
            "Specifications" => $row[2],
            "Unit" => $row[3],
            "Price_Min" => floatval(
                $row[4]
            ),
            "Price_Max" => floatval($row[5]),
            "Currency" => $row[6],
            "Discount" => floatval(
                $row[7]
            ),
            "Monthly_Trend" => floatval(
                $row[8]
            ),
            "Location" => $row[9],
            "Notes" => $row[10],
            "Keywords" => $row[11],
            "Photo" => $row[12],


            // "Photo" => $row[18],
        ]);
    }
}
