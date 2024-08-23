<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'password_resets';

    // Disable auto-incrementing
    public $incrementing = false;

    // Disable timestamps if not used
    public $timestamps = false;

    // Define the fillable attributes
    protected $fillable = [
        'email',
        'token',
    ];
}
