<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Vedio_ratings extends Model
{
    use HasFactory;
    protected $table = 'Vedio_ratings';
    protected $fillable = [
        'user_id','track_id',
        'stars_rated',

    ];

}