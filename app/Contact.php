<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * client type "0" lead , "1" client
     */
    protected $fillable = [
        'title_id', 'name', 'email', 'primary_mobile', 'secondry_mobile', 'phone','company_id', 'whatsapp','facebook',
        'fb_account', 'website', 'address', 'birthdate', 'country_id', 'city_id', 'nationality_id',
        'job', 'company', 'contact_type', 'assigned_to', 'reach_source_id', 'image','customer_type', 'identity',
        'identity_path', 'status_id','created_by_user','education'
    ];
    
    public function title()
    {
        return $this->belongsTo('App\Title','title_id');
    }
    public function country()
    {
        return $this->belongsTo('App\Country','country_id');
    }

    public function createdBy()
    {
        return $this->belongsTo('App\User','created_by_user');
    }
    public function city()
    {
        return $this->belongsTo('App\City','city_id');
    }
    public function nationality()
    {
        return $this->belongsTo('App\Nationality','nationality_id');
    }


    public function assign()
    {
        return $this->belongsTo('App\User','assigned_to');
    }
    public function reach()
    {
        return $this->belongsTo('App\Reach_Source','reach_source_id');
    }


    public function status()
    {
        return $this->belongsTo('App\Status','status_id');
    }
    public function activity()
    {
        return $this->hasMany('App\Contact_activity','contact_id','id');
    }
    public function todo()
    {
        return $this->hasManyThrough('App\Models\Contact_activity', 'App\Models\todo');
    }
    public function latestLog()
{
return $this->hasOne('App\Contact_activity')->latest();
}
   
}
