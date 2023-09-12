<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Search_History extends Model
{
    use HasFactory;
    public $table = "search_history";
    public $timestamps = false;
}
