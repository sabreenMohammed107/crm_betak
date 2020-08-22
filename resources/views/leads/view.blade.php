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
  <div class="convert">
    <!-- <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addservicToClient"> Convert to client </a> -->
    {{--<a href="#" onclick="confirrm('convert to client','{{$row->id}}')" class="btn btn-dark">{{ __('Convert to client') }} </a>--}}
           
<form id="convert_{{$row->id}}" action="{{ route('convert-to-client') }}"  method="POST" style="display: none;">
@csrf
<input type="hidden" value="{{$row->id}}" name="coverter">
<button type="submit" value=""></button>
</form>
  </div>
  <div class="img-holder">
    <img src="@if($row->image){{ asset('uploads/')}}/{{ $row->image }} @else {{ asset('assets/img/default-user.gif')}} @endif" alt="">
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
        <b>ID: </b> {{$row->id}}
      </a>
      <a href="#" class="list-group-item">
        <b>Name: </b> {{$row->name}}
      </a>
      <a href="#" class="list-group-item">
        <b>Primary Mobile: </b> {{$row->primary_mobile}}
      </a>
      <a href="#" class="list-group-item">
        <b>Secondary Mobile: </b> {{$row->secondry_mobile}}
      </a>
 <!--
    {{--
      <a href="#" class="list-group-item">
        <b>DOB: </b> {{$row->birthdate}}
      </a>
      <a href="#" class="list-group-item">
        <b>Address: </b> {{$row->address}}
      </a>--}} -->
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
      <!--
     {{-- <a href="#" class="list-group-item">
        <b>Company: </b> {{$row->company}}
      </a>--}} -->
      <a href="#" class="list-group-item">
        <b>Customer Type: </b> @if($row->customer_type==1)Indivdual @else Company @endif
      </a>
      <a href="#" class="list-group-item">
        <b>Reach Source : </b> @if($row->reach){{$row->reach->name}} @endif
      </a>
      <a href="#" class="list-group-item">
        <b>Created By : </b> {{$row->createdBy->name ?? ''}}
      </a>

    </div>
  </div>
  <div class="col-12" id="contentBar">
    <div class="row">
      <div class="col-md-12">
        <div class="ms-panel">
          <div class="ms-panel-header d-flex justify-content-between">
            <h6>ُActivities </h6>
            <a href="{{ route('add-lead-activity',$row->id) }}" class="btn btn-dark"> add Activities </a>
          </div>

          <div class="ms-panel-body">

            <div class="table-responsive">
              <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                <thead>
                  <tr>
                    <th scope="col">Activity</th>
                    <th scope="col">Activity Type</th>
                    <th scope="col">Activity Date</th>
                    <th scope="col">Person Status</th>
                    <th scope="col">Connection Type</th>
                    <th scope="col">Note</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($activities as $index => $activity)
                  <tr>
                    <td>{{$activity->activity->name}}</td>
                    <td>@if($activity->activity_type==2)Todo $else Event @endif</td>
                    <td>@if($activity->activity){{$activity->activity->name}}@endif</td>
                    <td>{{$activity->activity_date}}</td>
                    <td>@if($activity->status){{$activity->status->name}}@endif</td>
                    <td>{{$activity->notes}}</td>
                    <!-- <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Asperiores nobis hic sint necessitatibus autem velit in deserunt est animi. Ipsa earum quos obcaecati exercitationem soluta natus explicabo ducimus illo dolorem.</td> -->
                    <td>
                    <a href="{{ route('edit-lead-activity',$activity->id) }}" class="btn btn-dark d-inline-block">Edit</a>
                      <a href="#" onclick="destroy('this row','{{$activity->id}}')" class="btn d-inline-block btn-danger">delete</a>
                      <form id="delete_{{$activity->id}}" action="{{ route('delete-lead-activity', $activity->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" value=""></button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
</div>
@endsection

@section('modal')


<div class="modal fade" id="addservicToClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="ms-auth-container row no-gutters">
          <div class="col-12 p-3">

            <form id="convert_{{$row->id}}" action="{{ route('convert-to-client') }}" method="post">
              {{ csrf_field() }}
              <input type="hidden" value="{{$row->id}}" name="coverter">
              <!-- <div class="form-group">
                <label>Select service</label>
                <select name="" class="form-control" id="">
                  <option value="Egypt">steudent senior-java</option>
                  <option value="USA">steudent senior-Andorid</option>
                  <option value="UAE">steudent senior-web php</option>
                  <option value="UAE">steudent senior-linux</option>
                  <option value="UAE">steudent senior-haking</option>
                  <option value="UAE">steudent senior-mean stack</option>
                  <option value="UAE">steudent senior-Adf</option>
                  <option value="UAE">steudent senior-react</option>
                </select>
              </div> -->

              <div class="form-group">
                <label class="exampleInputPassword1" for="exampleCheck1">Contact Service Notes </label>
                <textarea class="form-control" name="" rows="8"></textarea>
              </div>
          </div>
          <div class="input-group d-flex justify-content-end text-center">
            <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">
            <input type="button" value="Add" onclick="confirrm('convert to client','{{$row->id}}')" class="btn btn-success ">
          </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>


@endsection