<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\User;
use File;
use DB;
use Log;
use Carbon\Carbon;
use Illuminate\Database\QueryException;

class CompanyController extends Controller
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
    public function __construct(Company $object)
    {
        $this->middleware('auth'); 
        //get user
       $this->middleware(function ($request, $next) {
           $this->user = auth()->user();
           return $next($request);
       });
        $this->object = $object;
        $this->viewName = 'company.';
        $this->routeName = 'company.';
        $this->message = 'The Data has been saved';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get companies where user login
        $rows  = Company::with('user')->where('id', $this->user->company_id)->get();

        return view($this->viewName . 'index', compact('rows'));
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


        $data = [
            'name' => $request->input('name'),
            'mobile_1' => $request->input('mobile_1'),
            'mobile_2' => $request->input('mobile_2'),
            'email' => $request->input('email'),
            'phone' =>  $request->input('phone'),
            'address' => $request->input('address'),


        ];


        if ($request->hasFile('pic')) {
            $image = $request->file('pic');

            $data['logo'] = $this->UplaodImage($image);
        }
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
        $row = Company::find($id);
        $users = User::where('company_id', '=', $id)->get();

        return view($this->viewName.'view', compact('row','users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Company::find($id);
        $users = User::where('company_id', '=', $id)->get();

        return view($this->viewName.'edit', compact('row','users'));
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
            'mobile_1' => $request->input('mobile_1'),
            'mobile_2' => $request->input('mobile_2'),
            'email' => $request->input('email'),
            'phone' =>  $request->input('phone'),
            'address' => $request->input('address'),


        ];


        if ($request->hasFile('pic')) {
            $image = $request->file('pic');

            $data['logo'] = $this->UplaodImage($image);
        }

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
        $row=Company::where('id', '=', $id)->first();
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
        $imageName = $name;
        $uploadPath = public_path('uploads');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }
}
