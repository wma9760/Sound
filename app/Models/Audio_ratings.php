<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Audio_ratings extends Model
{
    use HasFactory;
    protected $table = 'Audio_ratings';
    protected $fillable = [
        'user_id','track_id',
        'stars_rated',

    ];

}