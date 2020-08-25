<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Title;
use App\City;
use App\Country;
use App\Nationality;
use App\User;
use App\Reach_Source;
use App\Activity_source;
use App\Contact_activity;
use App\Status;
use App\Activity;
use App\Service;
use App\Activity_service;
use App\todo_status;
use File;
use DB;
use Log;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
class LeadController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Contact $object)
    {
        $this->middleware('auth'); 
        //get user
       $this->middleware(function ($request, $next) {
           $this->user = auth()->user();
           return $next($request);
       });        $this->object = $object;
        $this->viewName = 'leads.';
        $this->routeName = 'lead.';
        $this->message = 'The Data has been saved';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $rows = $this->object::with('activity')->where('contact_type', '=', 0)->orderBy("created_at", "Desc")->where('company_id', '=', $this->user->company_id)->get();
        // $rows=$rows->whereIn("activity.todo_status_id", [1,3,4])->get()->toArray();
     $rows=$this->object::with(['activity' => function ($q) {
        $q->whereIn('todo_status_id' ,[1,3,4]);
    }])->where('contact_type', '=', 0)
    ->where('company_id', '=', $this->user->company_id)
    ->get();

       $xx =$this->object::with('activity')
           ->join('contact_activities','contacts.id', '=', 'contact_activities.contact_id')
             ->whereIn('contact_activities.todo_status_id' ,[1,3,4])
       ->where('contact_type', '=', 0)
       ->where('company_id', '=', $this->user->company_id)
       ->get();
     
        $titles = Title::where('company_id', '=', $this->user->company_id)->get();
        $countries = Country::where('company_id', '=', $this->user->company_id)->get();
        $cities = City::where('company_id', '=', $this->user->company_id)->get();
        $nationalities = Nationality::where('company_id', '=', $this->user->company_id)->get();
        $users = User::where('company_id', '=', $this->user->company_id)->get();
        $reachs = Reach_Source::where('company_id', '=', $this->user->company_id)->get();
        return view($this->viewName . 'index', compact('rows', 'titles', 'countries', 'cities', 'nationalities', 'users', 'reachs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titles = Title::where('company_id', '=', $this->user->company_id)->get();
        $countries = Country::where('company_id', '=', $this->user->company_id)->get();
        $cities = City::where('company_id', '=', $this->user->company_id)->get();
        $nationalities = Nationality::where('company_id', '=', $this->user->company_id)->get();
        $users = User::where('company_id', '=', $this->user->company_id)->get();
        $reachs = Reach_Source::where('company_id', '=', $this->user->company_id)->get();
        return view($this->viewName . 'create', compact('titles', 'countries', 'cities', 'nationalities', 'users', 'reachs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = [
            'name' => $request->input('name'),
            'whatsapp' => $request->input('whatsapp'),
            'facebook' => $request->input('facebook'),
            'primary_mobile' => $request->input('primary_mobile'),
            'secondry_mobile' => $request->input('secondry_mobile'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'fb_account' => $request->input('fb_account'),
            'address' => $request->input('address'),
            'website' => $request->input('website'),
            'birthdate' =>Carbon::parse($request->input('birthdate')),
            'job' => $request->input('job'),
            'company' => $request->input('company'),
            'contact_type' => $request->input('contact_type'),
            'identity' => $request->input('identity'),
            'created_by_user' => $request->input('created_by_user'),
            'education'=>$request->input('education')

        ];

        if ($request->input('customer_type')) {

            $data['customer_type'] = $request->input('customer_type');
        }
        if ($request->input('city_id')) {

            $data['city_id'] = $request->input('city_id');
        }

        if ($request->input('nationality_id')) {

            $data['nationality_id'] = $request->input('nationality_id');
        }


        if ($request->input('assigned_to')) {

            $data['assigned_to'] = $request->input('assigned_to');
        }

        if ($request->input('reach_source_id')) {

            $data['reach_source_id'] = $request->input('reach_source_id');
        }

        if ($request->input('title_id')) {

            $data['title_id'] = $request->input('title_id');
        }

        if ($request->input('country_id')) {

            $data['country_id'] = $request->input('country_id');
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $data['image'] = $this->UplaodImage($image);
        }
        if ($request->hasFile('identity_path')) {
            $identity_path = $request->file('identity_path');

            $data['identity_path'] = $this->UplaodImage($identity_path);
        }
        $data['company_id'] = $this->user->company_id;
        $this->object::create($data);




        return redirect()->route($this->routeName . 'index')->with('flash_success', $this->message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = $this->object::where('id','=',$id)->first();
        // $rows = $this->object::where('contact_type', '=', 1)->orderBy("created_at", "Desc")->get();
        $titles = Title::where('company_id', '=', $this->user->company_id)->get();
        $countries = Country::where('company_id', '=', $this->user->company_id)->get();
        $cities = City::where('company_id', '=', $this->user->company_id)->get();
        $nationalities = Nationality::where('company_id', '=', $this->user->company_id)->get();
        $users = User::where('company_id', '=', $this->user->company_id)->get();
        $reachs = Reach_Source::where('company_id', '=', $this->user->company_id)->get();
        $activities = Contact_activity::where('contact_id', '=', $id)->orderBy("created_at", "Desc")->get();
        return view($this->viewName . 'view', compact('row', 'titles','activities', 'countries', 'cities', 'nationalities', 'users', 'reachs'));
    }
public function convertToClient(Request $request){
    $id= $request->input('coverter');
    $data = [
        'contact_type' =>1,
    ];
    $this->object::findOrFail($id)->update($data);

    return redirect()->route($this->routeName.'index')->with('flash_success', $this->message);
}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = $this->object::with('activity')->where('id',$id)->first();
        // $rows = $this->object::where('contact_type', '=', 1)->orderBy("created_at", "Desc")->get();

        $titles = Title::where('company_id', '=', $this->user->company_id)->get();
        $countries = Country::where('company_id', '=', $this->user->company_id)->get();
        $cities = City::where('company_id', '=', $this->user->company_id)->get();
        $nationalities = Nationality::where('company_id', '=', $this->user->company_id)->get();
        $users = User::where('company_id', '=', $this->user->company_id)->get();;
        $reachs = Reach_Source::where('company_id', '=', $this->user->company_id)->get();
        return view($this->viewName . 'edit', compact('row', 'titles', 'countries', 'cities', 'nationalities', 'users', 'reachs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $data = [
            'name' => $request->input('name'),
            'whatsapp' => $request->input('whatsapp'),
            'facebook' => $request->input('facebook'),
            'primary_mobile' => $request->input('primary_mobile'),
            'secondry_mobile' => $request->input('secondry_mobile'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'fb_account' => $request->input('fb_account'),
            'address' => $request->input('address'),
            'website' => $request->input('website'),
            'birthdate' =>Carbon::parse($request->input('birthdate')),
            'job' => $request->input('job'),
            'company' => $request->input('company'),
            'contact_type' => $request->input('contact_type'),
            'identity' => $request->input('identity'),
            'company' => $request->input('company'),

        ];

        if ($request->input('customer_type')) {

            $data['customer_type'] = $request->input('customer_type');
        }
        if ($request->input('city_id')) {

            $data['city_id'] = $request->input('city_id');
        }

        if ($request->input('nationality_id')) {

            $data['nationality_id'] = $request->input('nationality_id');
        }


        if ($request->input('assigned_to')) {

            $data['assigned_to'] = $request->input('assigned_to');
        }

        if ($request->input('reach_source_id')) {

            $data['reach_source_id'] = $request->input('reach_source_id');
        }

        if ($request->input('title_id')) {

            $data['title_id'] = $request->input('title_id');
        }

        if ($request->input('country_id')) {

            $data['country_id'] = $request->input('country_id');
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $data['image'] = $this->UplaodImage($image);
        }
        if ($request->hasFile('identity_path')) {
            $identity_path = $request->file('identity_path');

            $data['identity_path'] = $this->UplaodImage($identity_path);
        }
        $data['company_id'] = $this->user->company_id;
        $this->object::findOrFail($id)->update($data);

        return redirect()->route($this->routeName.'index')->with('flash_success', $this->message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Contact::where('id', '=', $id)->first();
        // Delete File ..
        $file = $row->image;

        $file_name = public_path('uploads/' . $file);

        try {
            $row->delete();
            File::delete($file_name);
        } catch (QueryException $q) {

            return redirect()->back()->with('flash_danger', 'You cannot delete related with another...');
        }

        return redirect()->route($this->routeName . 'index')->with('flash_success', 'Data Has Been Deleted Successfully !');
    }

    public function UplaodImage($file_request)
    {
        //  This is Image Info..
        $file = $file_request;
        $name = $file->getClientOriginalName();
        $ext  = $file->getClientOriginalExtension();
        $size = $file->getSize();
        $path = $file->getRealPath();
        $mime = $file->getMimeType();


        // Rename The Image ..
        $imageName = $name;
        $uploadPath = public_path('uploads');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }
 /**
     * 
     * Activity
     */

    public function addActivity($id)
    {
        $row = Contact::find($id);
        $solved = User::where('company_id', '=', $this->user->company_id)->get();
        $services1 = Service::where('company_id', '=', $this->user->company_id)->where('service_type','=',0)->orderBy("text", "asc")->get();
        $asigns = User::where('company_id', '=', $this->user->company_id)->get();
        $status = Status::where('company_id', '=', $this->user->company_id)->get();
        $activities = Activity::where('company_id', '=', $this->user->company_id)->get();
        $sourses=Activity_source::where('company_id', '=', $this->user->company_id)->get();
        $todoStatus=todo_status::where('company_id', '=', $this->user->company_id)->get();
        return view($this->viewName . 'addActivity', compact('row','sourses', 'activities','todoStatus', 'status', 'asigns', 'services1', 'solved'));
    }
    public function saveActivity(Request $request)
    {

        $id = $request->input('contact_id');
        $data = [
            'contact_id' => $request->input('contact_id'),
            'activity_type' => $request->input('activity_type'),
            'activity_date' => Carbon::parse($request->input('activity_date')),
            'max_todo_date' => Carbon::parse($request->input('max_todo_date')),
            'facebook_url' => $request->input('facebook_url'),


            'notes' => $request->input('notes'),


        ];

        if ($request->input('activity_type_id')) {

            $data['activity_type_id'] = $request->input('activity_type_id');
        }
        if ($request->input('ingoing_outgoining_flag')) {

            $data['ingoing_outgoining_flag'] = $request->input('ingoing_outgoining_flag');
        }
        if ($request->input('status_id')) {

            $data['status_id'] = $request->input('status_id');
        }
        if ($request->input('priority')) {

            $data['priority'] = $request->input('priority');
        } else {
            $data['priority'] = 2;
        }
        if ($request->input('assigned_to')) {

            $data['assigned_to'] = $request->input('assigned_to');
        }
        if ($request->input('todo_status_id')) {

            $data['todo_status_id'] = $request->input('todo_status_id');
        }
        $all_services = [];
        

        foreach ($request->input('service_id') as $image) {

            $data['service_id'] = $image;
            $all_services[] =$image;
        }
       
        //passing parameter to transaction
        DB::transaction(function () use ($data, $all_services) {
            $Contact_activity = Contact_activity::create($data);
            foreach ($all_services as $service) {
                $input['activity_id'] = $Contact_activity->id;
                $input['service_id'] = $service;
                Activity_service::create($input);
            }
        });





         return redirect()->route($this->routeName . 'show', $id)->with('flash_success', $this->message);
    }

    public function dynamicService()
    {
        $dataAjax = array();

        $services1 = Service::all();



        return ($services1);
    }
   
    public function editActivity($id)
    {
        $activity = Contact_activity::find($id);
        $rowId = $activity->contact_id;
        $row = Contact::find($rowId);
        $solved = User::where('company_id', '=', $this->user->company_id)->get();
        $services1 = Service::where('company_id', '=', $this->user->company_id)->where('service_type','=',0)->orderBy("text", "asc")->get();
        $asigns = User::where('company_id', '=', $this->user->company_id)->get();
        $status = Status::where('company_id', '=', $this->user->company_id)->get();
        $activities = Activity::where('company_id', '=', $this->user->company_id)->get();
        $sourses = Activity_source::where('company_id', '=', $this->user->company_id)->get();
        $services = Activity_service::where('activity_id', '=', $id)->orderBy("created_at", "Desc")->get();
        $todoStatus=todo_status::where('company_id', '=', $this->user->company_id)->get();
        $tags = $activity->service;
        // dd($tags[0]['text']);
        return view($this->viewName . 'editActivity', compact('activity','tags', 'row','todoStatus', 'sourses', 'activities', 'status', 'asigns', 'services1', 'solved'));
    }
    public function deleteActivity($id)
    {
        $row = Contact_activity::where('id', '=', $id)->first();
        // // Delete File ..
        // $file = $row->image;
        // $file2 = $row->image;

        // $file_name = public_path('uploads/' . $file);
        // $file_name2 = public_path('uploads/' . $file2);

        try {
            $row->delete();
            // File::delete($file_name);
        } catch (QueryException $q) {

            return redirect()->back()->with('flash_danger', 'You cannot delete related with another...');
        }

        return redirect()->route($this->routeName . 'show', $row->contact_id)->with('flash_success', 'Data Has Been Deleted Successfully !');
    }

    public function updateActivity(Request $request)
    {
        $updatedId = $request->input('updatedId');
        $id = $request->input('contact_id');
        $data = [
            'contact_id' => $request->input('contact_id'),
            'activity_type' => $request->input('activity_type'),
            'activity_date' => Carbon::parse($request->input('activity_date')),
            'max_todo_date' => Carbon::parse($request->input('max_todo_date')),
            'facebook_url' => $request->input('facebook_url'),


            'notes' => $request->input('notes'),


        ];

        if ($request->input('activity_type_id')) {

            $data['activity_type_id'] = $request->input('activity_type_id');
        }
        if ($request->input('ingoing_outgoining_flag')) {

            $data['ingoing_outgoining_flag'] = $request->input('ingoing_outgoining_flag');
        }
        if ($request->input('status_id')) {

            $data['status_id'] = $request->input('status_id');
        }
        if ($request->input('priority')) {

            $data['priority'] = $request->input('priority') - 1;
        }
        if ($request->input('assigned_to')) {

            $data['assigned_to'] = $request->input('assigned_to');
        }
        if ($request->input('todo_status_id')) {

            $data['todo_status_id'] = $request->input('todo_status_id');
        }
        if ($request->input('todo_solved_by')) {

            $data['todo_solved_by'] = $request->input('todo_solved_by');
        }
        if ($request->input('activity_source_id')) {

            $data['activity_source_id'] = $request->input('activity_source_id');
        }
        $all_services = [];

        foreach ($request->input('service_id') as $image) {

            $data['service_id'] = $image;
            $all_services[] = $image;
        }

        //passing parameter to transaction
    
        DB::transaction(function () use ($data, $all_services, $updatedId) {

            $activity = Contact_activity::where('id', '=', $updatedId)->first();
            $contact_activity = Contact_activity::findOrFail($updatedId)->update($data);
            $activity->service()->sync($all_services);
        });

        return redirect()->route($this->routeName . 'show', $id)->with('flash_success', $this->message);
    }
    }

