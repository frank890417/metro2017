<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //mutator 在存入資料前先把第一個字大寫
    public function setNameAttribute($value){
        $this->attributes['name']= ucfirst($value);
    }

    public function setPasswordAttribute($value){
        $this->attributes['password']= bcrypt($value);
    }
}
