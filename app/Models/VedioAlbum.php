<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class VedioAlbum extends Model
{
    use HasFactory;
    protected $table = 'vedioalbums';

    protected $fillable = ['language_id', 'vedio_id','album_id'];

  
}