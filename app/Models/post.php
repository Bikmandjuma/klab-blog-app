<?php

namespace App\Models;
use Conner\Likeable\Likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory,Likeable;
    protected $fillable=[
        'title',
        'content',
        'user_id',
        'image'
    ];
}
