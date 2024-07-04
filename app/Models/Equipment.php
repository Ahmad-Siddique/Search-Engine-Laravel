<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    
    use HasFactory;
    public $table = "equipments_csv";
    public $timestamps = false;
    protected $fillable = ['CSI', "Description", "Specifications", "Unit", "Price_Min",  "Price_Max", "Currency", "Discount", "Monthly_Trend", "Location", "Notes", "Keywords", "Photo"];
}
