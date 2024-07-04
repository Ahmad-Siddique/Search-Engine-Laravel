<?php

namespace App\Imports;

use App\Models\Resource;
use Maatwebsite\Excel\Concerns\ToModel;

class ResourcesImport implements ToModel
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
        return new Resource([
            "CSI" => $row[0],
            "Name" => $row[1],
            "Qualification" => $row[2],
            "Experience" => $row[3],
            "Awards" => $row[4],
            "Currency" => $row[5],
            "Engagement" => $row[6],
            "Availability" => $row[7],
            "Price_Min" => floatval($row[8]),
            "Price_Max" => floatval($row[9]),
            "Location" => $row[10],
            "Nationality" => $row[11],
            "Age_Years" => floatval($row[12]),
            "Notes" => $row[13],
            "Photo" => $row[14],
            
            // "Photo" => $row[18],
        ]);
    }
}
