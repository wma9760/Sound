<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
      'gender',
    'mobileNo',
    'address',
    'country_id',
            'userimage',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Interact with the user's first name.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["user", "admin", "manager"][$value],
        );
    }
    public function isAdmin() {
        return $this->all()->where('type', 1);
     }
     public function tracks() {

        return $this->hasMany(Audio::class);

    }
    public function vediotracks() {

        return $this->hasMany(Vedio::class);

    }
}
// class User extends Authenticatable
// {
    // use Notifiable;
    // use HasFactory;
    // protected $table = 'users';
    // protected $fillable = [
    //     'name','DOB','gender','mobileNo','address','country_id','is_admin',
    //     'email',
    //     'password',
    //     'userimage',
    // ];
    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password'] = Hash::make($value);
    // }
    // public function setFilenamesAttribute($value)
    // {
    //     $this->attributes['userimage'] = json_encode($value);
    // }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
//     protected $casts = [
//         'email_verified_at' => 'datetime',
//     ];
// }
