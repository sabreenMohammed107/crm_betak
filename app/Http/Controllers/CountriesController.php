<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class CountriesController extends Controller
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
    public function __construct(Country $object)
    {
         $this->middleware('auth'); 
         //get user
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();
            return $next($request);
        });
        $this->object = $object;
        $this->viewName = 'countries.';
        $this->routeName = 'countries.';
        $this->message = 'The Data has been saved';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->object::where('company_id', '=', $this->user->company_id)->get();

        return view($this->viewName . 'index', compact('data'));
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
            'name' => 'required'
        ]);
        $input=[];
        $input['name'] = $request->input('name');
        $input['company_id'] = $this->user->company_id;

        Country::create($input);

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
        // Not Used..
        return redirect()->route($this->routeName . 'index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->object::findOrFail($id);

        return view($this->viewName . 'edit', compact('data'));
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
        $this->validate($request, [
            'name' => 'required',
        ]);

        $input = [];
        $input['company_id'] = $this->user->company_id;
        $input['name'] = $request->input('name');

        $this->object::findOrFail($id)->update($input);

        return redirect()->route($this->routeName . 'index')->with('flash_success', $this->message);
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

        return redirect()->route($this->routeName . 'index')->with('flash_success', $this->message)->with('flash_delete', 'true');
    }
}
