@extends('layouts.main')




@section('crumb')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('/') }}"><i class="material-icons"></i> {{ __('links.home') }} </a></li>
        <li class="breadcrumb-item active" aria-current="page"> {{ __('links.clients') }} </li>
    </ol>
</nav>

@endsection

@section('content')
<div class="row">

    <div class="col-md-12">


        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
                <h6>ُClients</h6>
                <!-- <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addClint"> add new </a> -->
            </div>
            <div class="ms-panel-body">
                <form action="{{route('client.update',$row->id)}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @method('PUT')

                    <input type="hidden" name="contact_type" value="1">

                    <div class="ms-auth-container row">


                        <div class="col-md-6">
                            <label> img_client </label>
                            <div class="form-group">
                                <div id="uploadTwo" class="img-upload">
                                    <img src="{{ asset('uploads/')}}/{{ $row->image }}" alt="">
                                    <div class="upload-icon">
                                        <input type="file" name="image" class="upload">
                                        <i class="fas fa-camera    "></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <label> Client Name </label>
                            <div class="form-group d-flex">
                                <select name="title_id" id="">
                                
                                    @foreach ($titles as $key => $data)
                                    <option value='{{$data->id}}' {{ $data->id == $row->title_id ? 'selected' : '' }}>
                                        {{ $data->name }}</option>
                                    @endforeach


                                </select>
                                <input type="text" name="name" value="{{$row->name}}" class="ml-1 form-control" value="" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">*Client Primary Mobile </label>
                                <input type="text" id="PrimaryMobile" value="{{$row->primary_mobile}}" name="primary_mobile" class="form-control" placeholder="Primary Mobile">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">*Client Secondary Mobile </label>
                                <input type="text" id="SecondaryMobile" value="{{$row->secondry_mobile}}" name="secondry_mobile" class="form-control" placeholder="Secondary Mobile">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">*Client Phone </label>
                                <input type="text" id="phone" value="{{$row->phone}}" name="phone" class="form-control" placeholder="Phone">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">*Client Email </label>
                                <input type="email" id="email" value="{{$row->email}}" name="email" class="form-control" placeholder="email">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">*Client Whatsapp </label>
                                <input type="text" id="Whatsapp" value="{{$row->whatsapp}}" name="whatsapp" class="form-control" placeholder="Whatsapp">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">*Client facebook </label>
                                <input type="text" id="facebook" value="{{$row->facebook}}" name="facebook" class="form-control" placeholder="facebook">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">*Client Website </label>
                                <input type="text" id="website" value="{{$row->website}}" name="website" class="form-control" placeholder="Website">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">*Client fb_account </label>
                                <input type="text" id="fb_account" value="{{$row->fb_account}}" name="fb_account" class="form-control" placeholder="fb_account">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">Client Job </label>
                                <input type="text" id="job" value="{{$row->job}}" name="job" class="form-control" placeholder="Client Job">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">Company </label>
                                <input type="text" id="company" value="{{$row->company}}" name="company" class="form-control" placeholder="Client Company">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Date of Birth</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <?php $date = date_create($row->created_date) ?>
                                     
                                    <input type="text" value="{{ date_format($date,'d-m-Y') }}" name="birthdate" class="form-control" data-toggle="datepicker" placeholder="Date of Birth">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">Client Address </label>
                                <input type="text" id="address" name="address" value="{{$row->address}}" class="form-control" placeholder="Client Address">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Client Country</label>
                                <select name="country_id" class="form-control" id="">
                                  
                                    @foreach ($countries as $data)
                                    <option value='{{$data->id}}' {{ $data->id == $row->country_id ? 'selected' : '' }}>
                                        {{ $data->name }}</option>
                                    @endforeach


                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Client City</label>
                                <select name="city_id" class="form-control" id="">
                                    <option value=''>
                                        @if($row->city)
                                        {{$row->city->name}}
                                        @endif</option>
                                    @foreach ($cities as $data)
                                    <option value='{{$data->id}}'>
                                        {{ $data->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Client Nationality </label>
                                <select name="nationality_id" class="form-control" id="">
                                    <option value=''>
                                        @if($row->nationality)
                                        {{$row->nationality->name}}
                                        @endif</option>
                                    @foreach ($nationalities as $data)
                                    <option value='{{$data->id}}'>
                                        {{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Customer Type </label>
                                <select name="customer_type" class="form-control" id="">
                                    <option value=''>
                                        @if($row->customer_type==1)
                                        indivdual
                                        @else
                                        company
                                        @endif</option>
                                    <option value="1">indivdual</option>
                                    <option value="2">company</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Assigned To </label>
                                <select name="assigned_to" class="form-control" id="">
                                    <option value=''>
                                        @if($row->assign)
                                        {{$row->assign->name}}
                                        @endif</option>
                                    @foreach ($users as $data)
                                    <option value='{{$data->id}}'>
                                        {{ $data->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Reach Source </label>
                                <select name="reach_source_id" class="form-control" id="">
                                    <option value=''>
                                        @if($row->reach)
                                        {{$row->reach->name}}
                                        @endif</option>
                                    @foreach ($reachs as $data)
                                    <option value='{{$data->id}}'>
                                        {{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">Client Identity </label>
                                <input type="text" id="Identity" value="{{$row->identity}}" name="identity" class="form-control" placeholder="Client Identity">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">Created By</label>
                                <input type="text" id="created_by_user" disabled value="@if($row->createdBy){{$row->createdBy->name}} {{$row->createdBy->full_name}}@endif" name="created_by_user" class="form-control" placeholder="No Created User">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label> img_identity </label>
                            <div class="form-group">
                                <div id="uploadOne" class="img-upload">
                                    <img src="{{ asset('uploads/')}}/{{ $row->identity_path }}" alt="">
                                    <div class="upload-icon">
                                        <input type="file" name="identity_path" class="upload">
                                        <i class="fas fa-camera"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-group d-flex justify-content-end text-center">
                        <a href="{{ route('client.index') }}" class="btn btn-dark mx-2"> Cancel</a>
                        <input type="submit" value="Add" class="btn btn-success ">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection