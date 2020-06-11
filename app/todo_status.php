<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class todo_status extends Model
{
    protected $fillable = [
        'name','company_id'
    ];
}
