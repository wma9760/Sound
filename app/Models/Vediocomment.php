<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vediocomment extends Model
{
    use HasFactory;
    protected $table = 'vediocomments';
    protected $fillable = [
        'user_id','track_id',
        'comment','parent_id'

    ];
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Vediocomment::class, 'parent_id');
    }

}
