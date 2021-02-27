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
use App\Funnel;
use App\todo_status;
use File;
use DB;
use Log;
use Carbon\Carbon;
use Illuminate\Database\QueryException;

class TodoList extends Controller
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
        });
        $this->object = $object;
        $this->viewName = 'todoList.';
        $this->routeName = 'todoList.';
        $this->message = 'The Data has been saved';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = array();
        $yassId = $this->user->id;
        if ($this->user->role->name == 'admin') {
            $xx = $this->object::where('contact_type', '=', 0)
                ->where('company_id', '=', $this->user->company_id)
                ->orderBy("created_at", "Desc")
                ->with('latestLog')->orWhereDoesntHave('latestLog')->get();
        } else {
            $xx = $this->object::where('contact_type', '=', 0)
                ->where('company_id', '=', $this->user->company_id)

                ->whereHas('activity', function ($query) use ($yassId) {
                    $query->where('assigned_to', $yassId);
                })

                ->orderBy("created_at", "Desc")
                ->with('latestLog')->orWhereDoesntHave('latestLog')->get();
        }

        foreach ($xx as $row) {
            if (isset($row->latestLog['todo_status_id'])) {
                if ($row->latestLog['todo_status_id'] == 1 || $row->latestLog['todo_status_id'] == 3 || $row->latestLog['todo_status_id'] == 4) {

                    array_push($rows, $row);
                }
            } else {
                array_push($rows, $row);
            }
        }


        $titles = Title::where('company_id', '=', $this->user->company_id)->get();
        $countries = Country::where('company_id', '=', $this->user->company_id)->get();
        $cities = City::where('company_id', '=', $this->user->company_id)->get();
        $nationalities = Nationality::where('company_id', '=', $this->user->company_id)->get();
        $users = User::where('company_id', '=', $this->user->company_id)->get();
        $reachs = Reach_Source::where('company_id', '=', $this->user->company_id)->get();
        return view($this->viewName . 'index', compact('rows', 'titles', 'countries', 'cities', 'nationalities', 'users', 'reachs'));
    }
    public function fetch_allLead(Request $request)
    {
        $all = $request->input('action1');
        $rows = array();
        $yassId = $this->user->id;
        if ($this->user->role->name == 'admin') {
            $xx = $this->object::where('contact_type', '=', 0)
                ->where('company_id', '=', $this->user->company_id)
                ->orderBy("created_at", "Desc")
                ->with('latestLog')->orWhereDoesntHave('latestLog')->get();
        } else {
            $xx = $this->object::where('contact_type', '=', 0)
                ->where('company_id', '=', $this->user->company_id)

                ->whereHas('activity', function ($query) use ($yassId) {
                    $query->where('assigned_to', $yassId);
                })

                ->orderBy("created_at", "Desc")
                ->with('latestLog')->orWhereDoesntHave('latestLog')->get();
        }
        if ($all == 0) {
            foreach ($xx as $row) {
                if (isset($row->latestLog['todo_status_id'])) {
                    if ($row->latestLog['todo_status_id'] == 1 || $row->latestLog['todo_status_id'] == 3 || $row->latestLog['todo_status_id'] == 4) {

                        array_push($rows, $row);
                    }
                } else {
                    array_push($rows, $row);
                }
            }
        } else {
            foreach ($xx as $row) {

                array_push($rows, $row);
            }
        }

        //    dd($rows);

        return view($this->viewName . 'preIndex', compact('rows'))->render();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = $this->object::where('id', '=', $id)->first();
        // $rows = $this->object::where('contact_type', '=', 1)->orderBy("created_at", "Desc")->get();
        $titles = Title::where('company_id', '=', $this->user->company_id)->get();
        $countries = Country::where('company_id', '=', $this->user->company_id)->get();
        $cities = City::where('company_id', '=', $this->user->company_id)->get();
        $nationalities = Nationality::where('company_id', '=', $this->user->company_id)->get();
        $users = User::where('company_id', '=', $this->user->company_id)->get();
        $reachs = Reach_Source::where('company_id', '=', $this->user->company_id)->get();
        $activities = Contact_activity::where('contact_id', '=', $id)->orderBy("created_at", "Desc")->get();
        return view($this->viewName . 'view', compact('row', 'titles', 'activities', 'countries', 'cities', 'nationalities', 'users', 'reachs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * 
     * Activity
     */

    public function addActivity($id)
    {
        $row = Contact::find($id);
        $solved = User::where('company_id', '=', $this->user->company_id)->get();
        $services1 = Service::where('company_id', '=', $this->user->company_id)->where('service_type', '=', 0)->orderBy("text", "asc")->get();
        $asigns = User::where('company_id', '=', $this->user->company_id)->get();
        $status = Status::where('company_id', '=', $this->user->company_id)->get();
        $activities = Activity::where('company_id', '=', $this->user->company_id)->get();
        $sourses = Activity_source::where('company_id', '=', $this->user->company_id)->get();
        $todoStatus = todo_status::where('company_id', '=', $this->user->company_id)->get();
        $funnels = Funnel::all();
        return view($this->viewName . 'addActivity', compact('row', 'funnels', 'sourses', 'activities', 'todoStatus', 'status', 'asigns', 'services1', 'solved'));
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
            'created_by' => $request->input('created_by'),
            'notes' => $request->input('notes'),
            //new Columns
            'followup_date' => Carbon::parse($request->input('followup_date')),
            'meeting_date' => Carbon::parse($request->input('meeting_date')),
            'discount_offer_date' => Carbon::parse($request->input('discount_offer_date')),
            //end New


        ];

        if ($request->input('funnel_id')) {

            $data['funnel_id'] = $request->input('funnel_id');
        }

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
            $all_services[] = $image;
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
        $services1 = Service::where('company_id', '=', $this->user->company_id)->where('service_type', '=', 0)->orderBy("text", "asc")->get();
        $asigns = User::where('company_id', '=', $this->user->company_id)->get();
        $status = Status::where('company_id', '=', $this->user->company_id)->get();
        $activities = Activity::where('company_id', '=', $this->user->company_id)->get();
        $sourses = Activity_source::where('company_id', '=', $this->user->company_id)->get();
        $services = Activity_service::where('activity_id', '=', $id)->orderBy("created_at", "Desc")->get();
        $todoStatus = todo_status::where('company_id', '=', $this->user->company_id)->get();
        $tags = $activity->service;
        // dd($tags[0]['text']);
        $funnels = Funnel::all();
        return view($this->viewName . 'editActivity', compact('activity', 'funnels', 'tags', 'row', 'todoStatus', 'sourses', 'activities', 'status', 'asigns', 'services1', 'solved'));
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
            'created_by' => $request->input('created_by'),

            'notes' => $request->input('notes'),


            //new Columns
            'followup_date' => Carbon::parse($request->input('followup_date')),
            'meeting_date' => Carbon::parse($request->input('meeting_date')),
            'discount_offer_date' => Carbon::parse($request->input('discount_offer_date')),
            //end New


        ];

        if ($request->input('funnel_id')) {

            $data['funnel_id'] = $request->input('funnel_id');
        }

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
