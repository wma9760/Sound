<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Vedio extends Model
{
    use HasFactory;
    protected $table = 'vedioes';
    protected $fillable = [
        'title','language_id','artist_id','gnere_id','audio','audioimage',
        'recommended',
        'trending',
        'desc',
        'featured',
        'status',
    ];

    public function setFilenamesAttribute($value)
    {
        $this->attributes['userimage'] = json_encode($value);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Vediocomment::class, 'commentable')->whereNull('parent_id');
    }
}
