<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable=['text','service_type','description'];


public function contact()
{
    return $this->belongsToMany(Contact_activity::class, 'activity_services',  'service_id','activity_id');
}


}