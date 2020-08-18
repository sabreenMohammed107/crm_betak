@extends('layouts.main')

@section('title', 'Titles')


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
                <h6>Leads</h6>
                <a href="{{ route('lead.create') }}" class="btn btn-dark" > add new </a>
            </div>
            <div class="ms-panel-body">

                <div class="table-responsive">
                    <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <!-- <th scope="col"></th> -->
                                <th scope="col">name</th>
                                <th scope="col">Primary Mobile</th>
                              
                                <th scope="col">Last Activity Date </th>
                                <th scope="col">Last Activity Notes </th>
                                <th scope="col">Created By</th>
                                <!-- <th scope="col">Main Service</th> -->
                                <!-- <th scope="col">Created By</th> -->

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rows as $index => $row)
                            <tr>
                                <td>{{$index+1}}</td>
                                {{--<th scope="row"><img src="@if($row->image){{ asset('uploads/')}}/{{ $row->image }} @else {{ asset('assets/img/default-user.gif')}} @endif" alt=""></th>--}}
                                <td>{{$row->name}}</td>
                                <td>{{$row->primary_mobile}}</td>
                                <td> <?php 
                                $date=now();
                                if($row->activity->last()){
                                    $date = date_create($row->activity->last()->activity_date);
                                }
                                ?>
                                    {{ date_format($date,"d-m-Y") }} </td>
                                    <td style="width: 30%;"> 
                                 {{ $row->activity->last()->notes ?? '' }} </td>
                                <td> @if($row->createdBy)
                                    {{$row->createdBy->name}}
                                    @endif
                                </td>

                                <td>
                                <a href="{{ route('lead.edit',$row->id) }}" class="btn d-inline-block btn-info">Edit Lead</a>

                                    <a href="{{ route('lead.show',$row->id) }}" class="btn d-inline-block btn-info">view Activity</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('modal')

<!-- Add clints Modal -->
<div class="modal fade" id="addClint" tabindex="-1" role="dialog" aria-labelledby="addClint">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">

            <div class="modal-body">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="ms-auth-container row no-gutters">
                    <div class="col-12 p-3">
                        <form action="{{route('lead.store')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <input type="hidden" name="contact_type" value="0">

                            <div class="ms-auth-container row">


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="img-upload">
                                            <img src="{{ asset('assets/img/default-user.gif')}}" alt="">
                                            <div class="upload-icon">
                                                <input type="file" name="pic" class="upload">
                                                <i class="fas fa-camera    "></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label> lead Name </label>
                                    <div class="form-group d-flex">
                                        <select name="title_id" id="">
                                            <option value="">select</option>
                                            @foreach ($titles as $data)
                                            <option value='{{$data->id}}'>
                                                {{ $data->name }}</option>
                                            @endforeach


                                        </select>
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
                                        <label class="exampleInputPassword1" for="exampleCheck1">*lead Secondary Mobile </label>
                                        <input type="text" id="SecondaryMobile" name="secondry_mobile" class="form-control" placeholder="Secondary Mobile">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">lead Job </label>
                                        <input type="text" id="job" name="job" class="form-control" placeholder="lead Job">
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                      <div class="form-group">
                        <label for=""> actively date to</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                          </div>
                          <input type="text" class="form-control" data-toggle="datepicker" placeholder="actively date to">
                        </div>
                      </div>
                    </div> -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">lead Address </label>
                                        <input type="text" id="address" name="address" class="form-control" placeholder="lead Address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>lead Country</label>
                                        <select name="country_id" class="form-control" id="">
                                        <option value="">select</option>
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
                                        <option value="">select</option>
                                            @foreach ($cities as $data)
                                            <option value='{{$data->id}}'>
                                                {{ $data->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
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
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Customer Type </label>
                                        <select name="" class="form-control" id="">
                                            <option value="1">indivdual</option>
                                            <option value="2">company</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
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

                            </div>
                            <div class="input-group d-flex justify-content-end text-center">
                                <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">
                                <input type="submit" value="Add" class="btn btn-success ">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /Add clints Modal -->

@endsection