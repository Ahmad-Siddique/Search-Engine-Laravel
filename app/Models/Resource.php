<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;
    public $table = "resources_csv";
    public $timestamps = false;
    protected $fillable = ['CSI', "Name", "Qualification", "Experience", "Awards",  "Currency", "Photo", "Engagement", "Availability", "Location", "Nationality", "Age_Years", "Price_Min", "Notes", "Price_Max"];
}
