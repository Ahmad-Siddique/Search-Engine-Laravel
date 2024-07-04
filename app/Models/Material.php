<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    public $table = "materials_csv";
    public $timestamps = false;
    protected $fillable = ['CSI',"Description", "Brief_Specs", "Function", "Origin", "Currency", "Price_Min", "Price_Max", "Unit", "Discount", "Monthly_Trend", "Availability", "Alternate", "Alternate_CSI", "Notes", "Keywords", "Photo"];
}
