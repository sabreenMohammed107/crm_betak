<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\City;
class CitiesController extends Controller
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
    public function __construct(City $object)
    {
        $this->middleware('auth'); 
        $this->object = $object;
        $this->viewName = 'cities.';
        $this->routeName = 'cities.';
        $this->message = 'The Data has been saved';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = Country::pluck('name','id');
        $items = Country::all();
        // $data = City::latest()->paginate(5);
        $data =City::with('Country')->get();
        return view($this->viewName.'index',compact('data','items'));
        // ->with('i', (request()->input('page', 1) - 1) * 5);
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
        $request->validate([
            'name' => 'required',
            'country'=>'required'
            ]);
            City::create([
                'name' => request('name'),
                'country_id' => request('country'),
               
            ]);
            // City::create($request->all());
   
        return redirect()->route($this->routeName.'index')->with('flash_success', $this->message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country =Country::all()->pluck('name', 'id');
        $data = $this->object::findOrFail($id);
        $selected= $data->country_id;
        return view($this->viewName.'edit', compact('data','country','selected'));
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
        $request->validate([
            'name' => 'required',
            'country'=>'required'
            ]);
        
           $this->object::findOrFail($id)->update(([
            'name' => request('name'),
            'country_id' => request('country'),
           
        ]));
   
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
        $this->object::findOrFail($id)->delete();

        return redirect()->route($this->routeName.'index')->with('flash_success', $this->message)->with('flash_delete', 'true');
        
    }
}
