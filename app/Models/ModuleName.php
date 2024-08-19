<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleName extends Model
{
    protected static function booted()
    {
        static::saved(function ($moduleName) {
            app()->singleton('moduleNames', function () use ($moduleName) {
                return $moduleName;
            });
        });
    }
    
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
