<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name','company_id'
    ];

    public function city()
    {
        return $this->hasMany('App\City');
    }
}
