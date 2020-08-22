@extends('layouts.main')




@section('crumb')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('/') }}"><i class="material-icons"></i> {{ __('links.home') }} </a></li>
        <li class="breadcrumb-item active" aria-current="page"> {{ __('links.leads') }} </li>
    </ol>
</nav>

@endsection

@section('content')
<div class="row">

    <div class="col-md-12">


        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
                <h6>leads</h6>
                <!-- <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addClint"> add new </a> -->
            </div>
            <div class="ms-panel-body">
                <form action="{{route('lead.store')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <input type="hidden" name="contact_type" value="0">

                    <div class="ms-auth-container row">


                    {{-- <div class="col-md-6">
                        <label> img_lead </label>
                      <div class="form-group">
                        <div id="uploadTwo" class="img-upload">
                          <img src="{{ asset('assets/img/default-user.gif')}}" alt="">
                          <div class="upload-icon">
                            <input type="file" name="image" class="upload">
                            <i class="fas fa-camera    "></i>
                          </div>
                        </div>
                      </div>
                        </div>--}}
                       <div class="col-md-6">
                            <label>lead Name </label>
                            <div class="form-group d-flex">
{{--                                    <option value="">select</option>
                                    @foreach ($titles as $data)
                                    <option value='{{$data->id}}'>
                                        {{ $data->name }}</option>
                                    @endforeach


                                </select>--}}
                                <input type="text" name="name" class="ml-1 form-control" value="" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">*lead Primary Mobile </label>
                                <input type="text" id="PrimaryMobile" name="primary_mobile" class="form-control" placeholder="Primary Mobile">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">lead Secondary Mobile </label>
                                <input type="text" id="SecondaryMobile" name="secondry_mobile" class="form-control" placeholder="Secondary Mobile">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">Job </label>
                                <input type="text" id="job" value="طالب" name="job" class="form-control" placeholder="Job">
                            </div>
                        </div>
                        <!--
                       {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">*lead Phone </label>
                                <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">*lead Email </label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="email">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">*lead Whatsapp </label>
                                <input type="text" id="Whatsapp" name="whatsapp" class="form-control" placeholder="Whatsapp">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">*lead facebook </label>
                                <input type="text" id="facebook" name="facebook" class="form-control" placeholder="facebook">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">*lead Website </label>
                                <input type="text" id="website" name="website" class="form-control" placeholder="Website">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">*lead fb_account </label>
                                <input type="text" id="fb_account" name="fb_account" class="form-control" placeholder="fb_account">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">lead Job </label>
                                <input type="text" id="job" name="job" class="form-control" placeholder="lead Job">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">Company </label>
                                <input type="text" id="company" name="company" class="form-control" placeholder="lead Company">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Date of Birth</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <input type="text" name="birthdate" class="form-control" data-toggle="datepicker" placeholder="Date of Birth">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">lead Address </label>
                                <input type="text" id="address" name="address" class="form-control" placeholder="lead Address">
                            </div>
                        </div>--}}-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>lead Country</label>
                                <select name="country_id" class="form-control" id="">
                                    <!-- <option value="">select</option> -->
                                    @foreach ($countries as $data)
                                    <option value='{{$data->id}}'>
                                        {{ $data->name }}</option>
                                    @endforeach


                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> lead City</label>
                                <select name="city_id" class="form-control" id="">
                                    <!-- <option value="">select</option> -->
                                    @foreach ($cities as $data)
                                    <option value='{{$data->id}}'>
                                        {{ $data->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <!--
                      {{--  <div class="col-md-6">
                            <div class="form-group">
                                <label>lead Nationality </label>
                                <select name="nationality_id" class="form-control" id="">
                                    <option value="">select</option>
                                    @foreach ($nationalities as $data)
                                    <option value='{{$data->id}}'>
                                        {{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>--}} -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Customer Type </label>
                                <select name="customer_type" class="form-control" id="">
                                    
                                    <option value="1">indivdual</option>
                                    <option value="2">company</option>

                                </select>
                            </div>
                        </div>
                        <!--
                      {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label> Assigned To </label>
                                <select name="assigned_to" class="form-control" id="">
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
                                    @foreach ($reachs as $data)
                                    <option value='{{$data->id}}'>
                                        {{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">lead Identity </label>
                                <input type="text" id="Identity" name="identity" class="form-control" placeholder="lead Identity">
                            </div>
                        </div>--}} -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">Created By</label>
                                <input type="text" id="created_by_user" disabled value="{{ Auth::user()->name }} {{ Auth::user()->full_name }}" name="created_by_user" class="form-control" placeholder="lead Identity">
                                <input type="hidden"  value="{{ Auth::user()->id }}" name="created_by_user">
                            </div>
                        </div>
                        <!--
                       {{-- <div class="col-md-6">
                            <label> img_identity </label>
                            <div class="form-group">
                                <div id="uploadOne" class="img-upload">
                                    <img src="{{ asset('assets/img/default-user.gif')}}" alt="">
                                    <div class="upload-icon">
                                        <input type="file" name="identity_path" class="upload">
                                        <i class="fas fa-camera    "></i>
                                    </div>
                                </div>
                            </div>  
                        </div>--}}-->
                    </div>
                    <div class="input-group d-flex justify-content-end text-center">
                  <a href="{{ route('lead.index') }}" class="btn btn-dark mx-2"> Cancel</a>
                  <input type="submit" value="Add" class="btn btn-success ">
                </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection