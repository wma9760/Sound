<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','DOB','desc','artistimage','recommended','trending',
        'featured','status','language_id'
    ];

    public function setFilenamesAttribute($value)
    {
        $this->attributes['artistimage'] = json_encode($value);
    }
}
