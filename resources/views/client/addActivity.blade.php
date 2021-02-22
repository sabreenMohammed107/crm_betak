@extends('layouts.main')

@section('title', 'Titles')


@section('crumb')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('/') }}"><i class="material-icons"></i> {{ __('links.home') }} </a></li>
        <li class="breadcrumb-item active" aria-current="page"> {{ __('links.clients') }} </li>
    </ol>
</nav>

@endsection

@section('content')

<div class="fixed-profile mb-3 d-flex w-100 justify-content-between align-items-end">
    <div class="mini-submenu">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </div>
    <div class="d-flex align-items-center">
        <h2 class="mx-4"> {{$row->name}}</h2>
        <h5><i class="material-icons fs-16 mx-1">call</i>{{$row->primary_mobile}}</h5>
    </div>

    <div class="img-holder">
        <img src="{{ asset('uploads/')}}/{{ $row->image }}" alt="">
    </div>
</div>
<div class="row">
    <div class="col-sm-4 col-md-3 sidebar">

        <div class="list-group">
            <span href="#" class="d-flex justify-content-between list-group-item bg-dark text-white">
                <span>INFO</span>
                <span class="bg-light" id="slide-submenu">
                    <i class="fa fa-times"></i>
                </span>
            </span>
            <a href="#" class="list-group-item">
                <b>ID: </b> {{$row->identity}}
            </a>
            <a href="#" class="list-group-item">
                <b>Secondary Mobile: </b> {{$row->secondry_mobile}}
            </a>

            <a href="#" class="list-group-item">
                <b>DOB: </b> {{$row->birthdate}}
            </a>
            <a href="#" class="list-group-item">
                <b>Address: </b> {{$row->address}}
            </a>
            <a href="#" class="list-group-item">
                <b>Country Id: </b> @if($row->country){{$row->country->name}} @endif
            </a>
            <a href="#" class="list-group-item">
                <b>City Id: </b> @if($row->city){{$row->city->name}} @endif
            </a>
            <a href="#" class="list-group-item">
                <b>Nationality Id: </b> @if($row->nationality){{$row->nationality->name}} @endif
            </a>
            <a href="#" class="list-group-item">
                <b>JOB: </b> {{$row->job}}
            </a>
            <a href="#" class="list-group-item">
                <b>Company: </b> {{$row->company}}
            </a>
            <a href="#" class="list-group-item">
                <b>Customer Type: </b> {{$row->customer_type}}
            </a>
            <a href="#" class="list-group-item">
                <b>Reach Source : </b> @if($row->reach){{$row->reach->name}} @endif
            </a>
            <a href="#" class="list-group-item">
                <b>Contact Status Id : </b> @if($row->status){{$row->status->id}} @endif
            </a>

        </div>
    </div>
    <div class="col-12" id="contentBar">

        <div class="ms-content-wrapper custom-form" style="padding-top: 40px;">
            <div class="row">

                <div class="col-12">
                    <div class="ms-panel ms-panel-fh">
                        <div class="ms-panel-body">

                            <form class="needs-validation" action="{{route('saveActivity')}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="contact_type" value="1">
                                <input type="hidden" name="contact_id" value="{{$row->id}}">

                                <div class="row justify-content-between Services_Container">
                                  
                                    <div class="  col-sm-6 col-md-5  d-flex">
                                        <label for="name">Activity Type</label>
                                        <div class="input-group">

                                            <select name="activity_type" id="" class="form-control">
                                                <option value="1">Event</option>
                                                <option value="2">todo</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="  col-sm-6 col-md-5  d-flex">
                                        <label for="name">Client Id</label>
                                        <div class="input-group">

                                            <input type="text" name="contact_id" value="{{$row->id}}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="  col-sm-6 col-md-5  d-flex">
                                        <label for="name">Activity</label>
                                        <div class="input-group">
                                            <select name="activity_type_id" id="" class="form-control">
                                                <option value="">select</option>
                                                @foreach ($activities as $data)
                                                <option value='{{$data->id}}'>
                                                    {{ $data->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="  col-sm-6 col-md-5  d-flex">
                                        <label for="name">Activity date</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            </div>
                                            <input type="text" name="activity_date" class="form-control" data-toggle="datepicker">
                                        </div>
                                    </div>
                                    <div class="  col-sm-6 col-md-5  d-flex">
                                        <label for="name">max todo date</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            </div>
                                            <input type="text" name="max_todo_date" class="form-control" data-toggle="datepicker">
                                        </div>
                                    </div>
                                    <div class="  col-sm-6 col-md-5  d-flex">
                                        <label for="name">In Going Out Going Flag</label>
                                        <div class="input-group">
                                            <select name="ingoing_outgoining_flag" id="" class="form-control">
                                                <option value="1">contact with us </option>
                                                <option value="2">we conatct him</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="  col-sm-6 col-md-5  d-flex">
                                        <label for="name">Client Status</label>
                                        <div class="input-group">
                                            <select name="status_id" id="" class="form-control">
                                                <option value="">select</option>
                                                @foreach ($status as $data)
                                                <option value='{{$data->id}}'>
                                                    {{ $data->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="  col-sm-6 col-md-5  d-flex">
                                        <label for="name">facebook url</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                                            </div>
                                            <input type="text" name="facebook_url" class="form-control">
                                        </div>
                                    </div>

                                    <style>
                                        .star-rating input {
                                            display: none;
                                        }
                                    </style>

                                    <div class="  col-sm-6 col-md-5  d-flex">
                                        <label for="name">Periority</label>
                                        <div class="input-group">
                                            <div class="star-rating">
                                                <input type="radio" id="star1" name="priority" value="1">

                                                <label style="width: 15%;" for="star1" class="fa-star fas" data-rating="1"></label>
                                                <input type="radio" id="star2" name="priority" value="2">
                                                <label style="width: 15%;" for="star2" class="far fa-star" data-rating="2">
                                                </label>
                                                <input type="radio" id="star3" name="priority" value="3">
                                                <label style="width: 15%;" for="star3" class="far fa-star" data-rating="3"></label>
                                                <input type="radio" id="star4" name="priority" value="4">
                                                <label style="width: 15%;" for="star4" class="far fa-star" data-rating="4"></label>
                                                <input type="radio" id="star5" name="priority" value="5">
                                                <label style="width: 15%;" for="star5" class="far fa-star" data-rating="5"></label>
                                                <input type="hidden" name="whatever1" class="rating-value" value="2.56">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="  col-sm-6 col-md-5  d-flex">
                                        <label for="name">Assigned to</label>
                                        <div class="input-group">
                                        <select name="assigned_to" id="" class="form-control">
                                                <option value="">select</option>
                                                @foreach ($asigns as $data)
                                                <option value='{{$data->id}}'>
                                                    {{ $data->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="  col-sm-6 col-md-5  d-flex">
                                        <label for="name">Activity Source</label>
                                        <div class="input-group">
                                        <select name="activity_source_id" id="" class="form-control">
                                        @foreach ($sourses as $data)
                                                <option value='{{$data->id}}' {{$data->id==1 ? 'selected' : '' }}>
                                                    {{ $data->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="servicesss  col-sm-6 col-md-5  d-flex">
                                        <label for="name">Service 1</label>
                                        <div class="input-group">
                                            <select name="service_id[]" id="" class="form-control">
                                                <option value="">Servvvice</option>
                                                @foreach ($services1 as $data)
                                                <option value='{{$data->id}}'>
                                                    {{ $data->text }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="  col-sm-6 col-md-5  d-flex">
                                        <label for="name"> todo status</label>
                                        <div class="input-group">
                                            <select name="todo_status_id" id="" class="form-control">
                                                <option value="1">in progress </option>
                                                <option value="2">completed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="servicesss  col-sm-6 col-md-5  d-flex">
                                        <label for="name">Service 2</label>
                                        <div class="input-group">
                                            <select name="service_id[]" id="" class="form-control">
                                                <option value="">Servvvice</option>
                                                @foreach ($services1 as $data)
                                                <option value='{{$data->id}}'>
                                                    {{ $data->text }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="  col-sm-6 col-md-5  d-flex">
                                        <label for="name"> todo solved by</label>
                                        <div class="input-group">
                                            <select name="todo_solved_by" id="" class="form-control">
                                                <option value="">select </option>
                                                @foreach ($solved as $data)
                                                <option value='{{$data->id}}'>
                                                    {{ $data->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="servicesss  col-sm-6 col-md-5 row no-gutters">
                                        <label class="col-3" for="name">Service 3</label>
                                        <div class="d-flex col-9 w-100 justify-content-between">
                                            <div class="input-group">
                                                <select name="service_id[]" id="" class="form-control">
                                                    <option value="">Servvvice</option>
                                                    @foreach ($services1 as $data)
                                                <option value='{{$data->id}}'>
                                                    {{ $data->text}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <!-- <a href="#" class="ms-btn-icon btn-info " onclick="xx('{{$services1}}')" id="Add_new_DService"><i class="fas fa-plus"></i> -->
                                            
                                        </a>
                                        </div>
                                    </div>
                             
                                    <div class="  col-sm-6 col-md-5  d-flex">
                                        <label for="name"> created by</label>
                                        <div class="input-group">
                                            <input type="text"  readonly value="@if($row->createdBy){{$row->createdBy->name}} {{$row->createdBy->full_name}}@endif" name="created_by_user" class="form-control" placeholder="No Created User">                                            <div class="col-md-6">


                                        </div>
                                    </div>






                                </div>
                                <div class="row justify-content-between">
                                    <div class="col-md-6 d-flex">
                                        <label class="mt-2" for="">Note</label>
                                        <div class="mx-3">

                                            <textarea name="notes" id="" rows="10" class=" form-control editable"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group d-flex">
                                            <label class="mt-2" for="">Screenshot</label>
                                            <div class="mx-3 img-upload screenshot">
                                                <img src="../assets/img/midal-back.jpg" alt="">
                                                <div class="upload-icon">
                                                    <input type="file" name="pic" class="upload">
                                                    <i class="fas fa-camera    "></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group d-flex justify-content-end text-center">
                                    <a href="{{ route('client.show',$row->id) }}" class="btn btn-dark mx-2"> Cancel </a>
                                    <input type="submit" value="Save" class="btn btn-success ">
                                </div>
                        </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

<script>
    function xx(myArry){
  
  //  e.preventDefault();
     serviceSNum ++;
   
     $.ajax({
      url: "{{route('dynamicService.fetch')}}",
      method: "get",
    
      success: function(result) {
 
             $('#Add_new_DService').parents('.servicesss').append(
       `
       <div class="w-100"></div>
       <div class="mb-1 addeddd w-100 row no-gutters">
         <label class="col-3" for="name">Service ${serviceSNum}</label>
       <div class="input-group col-8">
           <select name="service_id[]" id="" class="form-control">
             <option value="">Servvvice</option>
             for (var x = 0; x < result.length; x++){
            
             <option value="${result[0]['id']}">${ result[0]['text']}</option>
             <option value="${result[1]['id']}">${ result[1]['text']}</option>
           <option value="${result[2]['id']}">${ result[2]['text']}</option>
           <option value="${result[3]['id']}">${ result[3]['text']}</option>
               }
              
           </select>
       </div>
       <div class="col-1"><button  onclick="deletteService(this)" class="ms-btn-icon btn-danger " id="Add_new_DService"><i class="fas fa-times"></i></button>
       </div>
     </div>
       `
     )
      }

    })
 

     
 }
</script>

    @endsection
    