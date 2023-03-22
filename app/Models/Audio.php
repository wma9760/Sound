<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Audio extends Model
{
    use HasFactory;
    protected $table = 'audioes';
    protected $fillable = [
        'title','language_id','artist_id','gnere_id','audio','audioimage',
        'recommended',
        'trending',
        'desc',
        'featured',
        'status','aproval'
    ];

    public function setFilenamesAttribute($value)
    {
        $this->attributes['userimage'] = json_encode($value);

         }
         protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }

}
