<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'address','mobile_1','mobile_2','logo','email','phone',
    ];

    public function user()
    {
        return $this->hasMany('App\User','company_id','id');
    }
}
