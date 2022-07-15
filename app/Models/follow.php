<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class follow extends Model
{
    protected $fillable = [
        'follow',
        'user',
        'following',
    ];

    use HasFactory;
}
