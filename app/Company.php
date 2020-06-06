<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'address','mobile_1','mobile_2','logo','email','phone'
    ];
}
