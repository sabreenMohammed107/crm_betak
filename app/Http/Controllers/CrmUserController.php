<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Company;
use File;
use DB;
use Log;
use Carbon\Carbon;
use Illuminate\Database\QueryException;

class CrmUserController extends Controller
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
    public function __construct(User $object)
    {
        $this->middleware('auth'); 
        //get user
       $this->middleware(function ($request, $next) {
           $this->user = auth()->user();
           return $next($request);
       });        $this->object = $object;
        $this->viewName = 'crm-users.';
        $this->routeName = 'crm-users.';
        $this->message = 'The Data has been saved';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = $this->object::orderBy("created_at", "Desc")->where('company_id', '=', $this->user->company_id)->get();
        $companies = Company::all();

        return view($this->viewName . 'index', compact('rows', 'companies'));
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
        $active = 0;

        if ($request->input('active') == 'on') {
            $active = 1;
        }



        $data = [
            'name'=>$request->input('name'),
            'full_name'=>$request->input('full_name'),
            'mobile_1'=>$request->input('mobile_1'),
            'mobile_2'=>$request->input('mobile_2'),
            'email'=>$request->input('email'),
            'hire_date'=>Carbon::parse($request->input('hire_date')),
            'phone'=>$request->input('phone'),
            'status'=>1,
            'address'=>$request->input('address'),
            'active' => $active,
            'password'=> uniqid(),

        ];

        if ($request->input('role_id')) {

            $data['role_id'] = $request->input('role_id');
        }

        if ($request->input('company_id')) {

            $data['company_id'] = $request->input('company_id');
        }
        if ($request->hasFile('pic')) {
            $image = $request->file('pic');

            $data['image'] = $this->UplaodImage($image);
        }
        $user=$this->object::create($data);




        return redirect()->route($this->routeName . 'index')->with('flash_success',"$user->name's password has been reset successfully! Password('$user->password')");
        // return redirect()->route($this->routeName . 'index')->with('flash_success', $this->message);
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
        $user = User::find($id);
        $user->Password = uniqid();
        $user->save();

        return redirect()->back()->with('flash_success',"$user->name's password has been reset successfully! Password('$user->Password')");
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
        $active = 0;

        if ($request->input('active') == 'on') {
            $active = 1;
        }



        $data = [
            'name'=>$request->input('name'),
            'full_name'=>$request->input('full_name'),
            'mobile_1'=>$request->input('mobile_1'),
            'mobile_2'=>$request->input('mobile_2'),
            'email'=>$request->input('email'),
            'hire_date'=>Carbon::parse($request->input('hire_date')),
            'phone'=>$request->input('phone'),
            'status'=>1,
            'address'=>$request->input('address'),
            'active' => $active,
          

        ];

        if ($request->input('role_id')) {

            $data['role_id'] = $request->input('role_id');
        }

        if ($request->input('company_id')) {

            $data['company_id'] = $request->input('company_id');
        }
        if ($request->hasFile('pic')) {
            $image = $request->file('pic');

            $data['image'] = $this->UplaodImage($image);
        }
       $user= $this->object::findOrFail($id)->update($data);
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
        $row=User::where('id', '=', $id)->first();
        // Delete File ..
        $file = $row->image;
      
        $file_name = public_path('uploads/'.$file);
             
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
		$imageName =$name;
		$uploadPath = public_path('uploads');
		
		// Move The image..
		$file->move($uploadPath, $imageName);
       
		return $imageName;
    }
}
