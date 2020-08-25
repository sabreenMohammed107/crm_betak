<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact_activity extends Model
{
    protected $fillable = [
        'contact_id','activity_type_id','activity_date','ingoing_outgoining_flag','activity_type','status_id','priority',
        'facebook_url','assigned_to','todo_status_id','todo_solved_by','max_todo_date','activity_source_id','notes',
    ];

    public function service()
    {
        return $this->belongsToMany(Service::class, 'activity_services', 'activity_id','service_id');
      
    }
    public function todo()
    {
        return $this->belongsTo('App\todo_status','todo_status_id');
    }

    
    public function contact()
    {
        return $this->belongsTo('App\Contact','contact_id');
    }
    public function activity()
    {
        return $this->belongsTo('App\Activity','activity_type_id');
    }
    public function status()
    {
        return $this->belongsTo('App\Status','status_id');
    }
    public function assign()
    {
        return $this->belongsTo('App\User','assigned_to');
    }
    public function solved()
    {
        return $this->belongsTo('App\User','todo_solved_by');
    }
    public function source()
    {
        return $this->belongsTo('App\Activity_source','activity_source_id');
    }
}
