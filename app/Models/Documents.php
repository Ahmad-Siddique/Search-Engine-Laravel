<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory;
    public $table = "documents_csv";
    public $timestamps = false;
    protected $fillable = ['CSI', "Description", "Keywords", "File"];
}
