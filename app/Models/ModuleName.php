<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleName extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'material',
        'resource',
        'service',
        'equipment',
        'reference',
        'gallery',
        'knowledgebase'
    ];
}
