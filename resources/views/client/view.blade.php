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
    <div class="row">
      <div class="col-md-12">
        <div class="ms-panel">
          <div class="ms-panel-header d-flex justify-content-between">
            <h6>ُActivities </h6>
            <a href="{{ route('add-activity',$row->id) }}" class="btn btn-dark"> add Activities </a>
          </div>

          <div class="ms-panel-body">

            <div class="table-responsive">
              <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Activity</th>
                    <th scope="col">Activity Type</th>
                    <th scope="col">Activity Date</th>
                    <th scope="col">Person Status</th>
                    <th scope="col">Connection Type</th>
                    <!-- <th scope="col">Note</th> -->
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($activities as $index => $activity)
                  <tr>
                    <td>{{$index+1}}</td>
                    <td>{{$activity->activity_type}}</td>
                    <td>@if($activity->activity){{$activity->activity->name}}@endif</td>
                    <td>{{$activity->activity_date}}</td>
                    <td>@if($activity->status){{$activity->status->name}}@endif</td>
                    <td>{{$activity->ingoing_outgoining_flag}}</td>
                    <!-- <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Asperiores nobis hic sint necessitatibus autem velit in deserunt est animi. Ipsa earum quos obcaecati exercitationem soluta natus explicabo ducimus illo dolorem.</td> -->
                    <td>
                      <a href="{{ route('edit-activity',$activity->id) }}" class="btn btn-dark d-inline-block">Edit</a>
                      <a href="#" onclick="destroy('this row','{{$activity->id}}')" class="btn d-inline-block btn-danger">delete</a>
                      <form id="delete_{{$activity->id}}" action="{{ route('delete-activity', $activity->id) }}" method="POST" style="display: none;">
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
    <div class="row">
      <div class="col-md-12">
        <div class="ms-panel">
          <div class="ms-panel-header d-flex justify-content-between">
            <h5>Services</h5>
            <button class="btn btn-dark" data-toggle="modal" data-target="#addservic"> new Services</button>
          </div>
          <div class="ms-panel-body">

            <div class="table-responsive">
              <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                <thead>
                  <tr>
                    <th scope="col">Service</th>

                    <th scope="col">Note</th>
                    <th scope="col"></th>

                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>senior</td>

                    <td>@reserved Courseريدهات لينكس</td>


                    <td>
                      <a href="#" class="btn btn-info d-inline-block" data-toggle="modal" data-target="#addservic">edit</a>
                      <a href="#" onclick="delette('this service');" class="btn d-inline-block btn-danger">delete</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('modal')


<!-- Modal -->
<div class="modal fade" id="addservic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="ms-auth-container row no-gutters">
          <div class="col-12 p-3">
            <form action="">

              <!-- <div class="form-group">
                  <label class="exampleInputPassword1" for="exampleCheck1">ContactServiceId </label>
                  <input type="text" id="newservic" class="form-control">
  
                </div>
                <div class="form-group">
                  <label class="exampleInputPassword1" for="exampleCheck1">ContactId
                  </label>
                  <input type="text" id="newservic" class="form-control">
                </div> -->

              <div class="form-group">
                <label>ContactCountryId</label>
                <select name="" class="form-control" id="">
                  <option value="">select....</option>
                  <option value="Egypt">steudent senior-java</option>
                  <option value="USA">steudent senior-Andorid</option>
                  <option value="UAE">steudent senior-web php</option>
                  <option value="UAE">steudent senior-linux</option>
                  <option value="UAE">steudent senior-haking</option>
                  <option value="UAE">steudent senior-mean stack</option>
                  <option value="UAE">steudent senior-Adf</option>
                  <option value="UAE">steudent senior-react</option>
                </select>
              </div>

              <div class="form-group">
                <label class="exampleInputPassword1" for="exampleCheck1">ContactServiceNotes </label>
                <textarea class="form-control" rows="8"></textarea>
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
<!-- model new activity -->
<div class="modal fade" id="addactivity" tabindex="-1" role="dialog" aria-labelledby="addactivity" aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">

      <div class="modal-body">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="ms-auth-container row no-gutters">
          <div class="col-12 p-3">
            <form action="">

              <div class="ms-auth-container row">

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleCheck1">ContactActivityId </label>
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleCheck1">ContactId </label>
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label> ActivityType </label>
                    <select name="" class="form-control" id="">
                      <option value="AVENT">AVENT</option>
                      <option value="TODO">TODO</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label> * ActivityId</label>
                    <select name="" class="form-control" id="">
                      <option value="">senior تطبيق</option>
                      <option value="">مكالمه</option>
                      <option value="">مقابله</option>
                      <option value="">زياره المركز</option>
                      <option value="">رساله sms </option>
                      <option value="">facbook رساله</option>
                      <option value="">whatspp رساله</option>
                      <option value="">old data </option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for=""> actively date to</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                      </div>
                      <input type="text" class="form-control" data-toggle="datepicker">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>IngoingOutgoingFlag</label>
                    <select name="" class="form-control" id="">
                      <option value="">تواصل معنا</option>
                      <option value="Egypt">تواصل مع</option>

                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label> ContactStatusId</label>
                    <select name="" class="form-control" id="">
                      <option value="">مبسوط بنا</option>
                      <option value="alex">مبسوط بنا جدا</option>
                      <option value="cairo">زعلان</option>
                      <option value="giza">قرفان</option>
                      <option value="giza">عادي</option>
                      <option value="giza">اسئله كتير</option>
                      <option value="giza">قلقان</option>
                      <option value="giza">خبره سابقه ف الكورسات</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleCheck1">FacebookUrl </label>
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label> notes</label>
                    <select name="" class="form-control" id="">
                      <option value="">select....</option>
                      <option value="alex">Arial</option>
                      <option value="cairo">courir now</option>
                      <option value="giza">comaic sans</option>
                      <option value="giza">impact</option>
                      <option value="giza">times new roman</option>
                      <option value="giza">Georgia</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleCheck1">ServiceId </label>
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleCheck1">ServiceId2 </label>
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleCheck1">ServiceId3 </label>
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for=""> MaxToDoDate</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                      </div>
                      <input type="text" class="form-control" data-toggle="datepicker">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label> AssignedTo </label>
                    <select name="" class="form-control" id="">
                      <option value="">select....</option>
                      <option value="">aya</option>
                      <option value="">Mohammad</option>

                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label> TodoStatusId</label>
                    <select name="" class="form-control" id="">
                      <option value="">None....</option>
                      <option value="">solved</option>
                      <option value="">not solved</option>
                      <option value="">in progress</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>TodoSolvedBy </label>
                    <select name="" class="form-control" id="">
                      <option value="">yasmin</option>
                      <option value="">aya</option>
                      <option value="">Mohammad</option>
                      <option value="">ahmad</option>
                      <option value="">yehia</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>CreatedBy </label>
                    <select name="" class="form-control" id="">
                      <option value="">.</option>
                      <option value="Egypt"></option>
                      <option value="USA"></option>

                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">img</label>
                    <div class="input-group">
                      <input type="file" name="pic" multiple>
                    </div>

                  </div>
                  <div class="input-group d-flex justify-content-end text-center">
                    <input type="button" value="Cancel" class="btn btn-dark mx-2" aria-label="Close">
                    <a class="btn btn-success " href="profile.html"> save</a>

                  </div>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- end Modal activity-->

  @endsection