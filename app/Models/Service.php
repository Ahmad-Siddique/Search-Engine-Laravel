<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    public $table = "service_csv";
    public $timestamps = false;
    protected $fillable = ['CSI', "Description", "Specifications", "Unit", "Price_Min",  "Price_Max", "Currency", "Discount", "Monthly_Trend", "Location", "Notes", "Keywords", "Photo"];
}
