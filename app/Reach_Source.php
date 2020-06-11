<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reach_Source extends Model
{
    protected $table='reach_sources';
    protected $fillable = ['name','company_id'];
}
