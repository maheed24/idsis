<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokenMapping extends Model
{
    use HasFactory;
    protected $table = 'token_mappings';

    protected $fillable = [
        'id', // Actual ID
        'token', // Unique token
    ];
}
