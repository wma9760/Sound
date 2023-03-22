<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Album extends Model
{
    use HasFactory;
    protected $table = 'albums';
    protected $fillable = [
        'name','albumimage',
        'recommended',
        // 'album_id',
        'trending',
        'desc',
        'featured',
        'status','category'
    ];
    public function AlbumSongs()
    {
        return $this->hasMany('App\AlbumSongs');
    }

}