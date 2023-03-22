<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioAlbum extends Model
{
    use HasFactory;
    protected $table = 'audioalbums';

protected $fillable = ['language_id', 'audio_id','album_id'];

  
}