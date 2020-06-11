@extends('layouts.main')

@section('title', 'Titles')


@section('crumb')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('/') }}"><i class="material-icons"></i> {{ __('links.home') }} </a></li>
        <li class="breadcrumb-item active" aria-current="page"> {{ __('links.users') }} </li>
    </ol>
</nav>

@endsection

@section('content')
<div class="row">
    <div class="col-md-12">



        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
                <h6>USERS</h6>
                <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addUser"> add new </a>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                        <thead>
                            <th>#</th>
                            <th>img</th>
                            <th>User Name</th>
                            <th>Full Name </th>
                            <th>Mobile 1</th>
                            <th>Company</th>
                            <th>Hire Date </th>
                            <th>Email</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($rows as $index => $row)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td><img src="{{ asset('uploads/')}}/{{ $row->image }}" alt=""></td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->full_name}}</td>
                                <td> {{$row->mobile_1}}</td>
                                <td> @if($row->company){{$row->company->name}}@endif</td>
                                <td>{{$row->hire_date}}</td>
                                <td>{{$row->email}}</td>
                                <td>
                                    <a href="{{ route('crm-users.edit', $row->id) }}" class="btn btn-info d-inline-block">Rest Pass</a>
                                    <a href="#" class="btn btn-info d-inline-block" data-toggle="modal" data-target="#addUser{{$row->id}}">edit</a>
                                    <a href="#" onclick="destroy('this Users','{{$row->id}}')" class="btn d-inline-block btn-danger">delete</a>
                                    <form id="delete_{{$row->id}}" action="{{ route('crm-users.destroy', $row->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" value=""></button>
                                    </form>
                                </td>
                            </tr>
                            <!-- Add user Modal -->
                            <div class="modal fade" id="addUser{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="addUser">
                                <div class="modal-dialog modal-lg " role="document">
                                    <div class="modal-content">

                                        <div class="modal-body">

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <div class="ms-auth-container row no-gutters">
                                                <div class="col-12 p-3">
                                                    <form action="{{route('crm-users.update',$row->id)}}" method="POST" enctype="multipart/form-data">
                                                        {{ csrf_field() }}

                                                        @method('PUT')

                                                        <div class="ms-auth-container row">

                                                            <div class="col-md-6">
                                                                <label> img_identity </label>
                                                                <div class="form-group">
                                                                    <div id="uploadOne" class="img-upload">
                                                                        <img src="{{ asset('uploads/')}}/{{ $row->image }}" alt="">
                                                                        <div class="upload-icon">
                                                                            <input type="file" name="pic" class="upload">
                                                                            <i class="fas fa-camera    "></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">

                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="exampleInputPassword1" for="exampleCheck1">UserName </label>
                                                                    <input type="text" id="newClint" name="name" value="{{$row->name}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="exampleInputPassword1" for="exampleCheck1">UserFullName </label>
                                                                    <input type="text" id="newClint" name="full_name" value="{{$row->full_name}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for=""> actively date to</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                                        </div>
                                                                        <input type="text" name="hire_date" value="{{$row->hire_date}}" class="form-control" data-toggle="datepicker">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="exampleInputPassword1" for="exampleCheck1">UserMobile </label>
                                                                    <input type="text" id="newClint" name="mobile_1" value="{{$row->mobile_1}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="exampleInputPassword1" for="exampleCheck1">UserMobile2 </label>
                                                                    <input type="text" id="newClint" name="mobile_2" value="{{$row->mobile_2}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="exampleInputPassword1" for="exampleCheck1">User Phone </label>
                                                                    <input type="text" id="newClint" name="phone" value="{{$row->phone}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="exampleInputPassword1" for="exampleCheck1">Email </label>
                                                                    <input type="email" id="newClint" required name="email" value="{{$row->email}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="exampleInputPassword1" for="exampleCheck1">Address </label>
                                                                    <input type="text" id="newClint" name="address" value="{{$row->address}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>*Role</label>
                                                                    <select name="role_id" class="form-control" id="">
                                                                        <option value="">
                                                                            @if($row->role_id==1)
                                                                            Admin
                                                                            @else
                                                                            User
                                                                            @endif
                                                                        </option>
                                                                        <option value="1">Admin</option>
                                                                        <option value="2">User</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Company</label>
                                                                    <select name="company_id" class="form-control" id="" required>
                                                                        <option value=""> @if($row->company)
                                                                            {{ $row->company->name}}

                                                                            @endif</option>
                                                                        @foreach ($companies as $company)
                                                                        <option value='{{$company->id}}'>
                                                                            {{ $company->name }}</option>
                                                                        @endforeach

                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <div class="custom-control custom-checkbox">
                                                                    @if($row->active == 1)
                                                                    <input type="checkbox" id="" name="active" checked>
                                                                    @else
                                                                    <input type="checkbox" id="" name="active">
                                                                    @endif
                                                                    <label for="scales">User Active</label>
                                                                </div>
                                                                <!-- <label class="custom-control-label" for="customCheck">User Active</label>
                          <input type="checkbox" class="custom-control-input" id="customCheck" name="example1"> -->
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
                @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>




</div>
</div>
</div>

@endsection
@section('modal')
<!-- Add user Modal -->
<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addUser">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">

            <div class="modal-body">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="ms-auth-container row no-gutters">
                    <div class="col-12 p-3">
                        <form action="{{route('crm-users.store')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="ms-auth-container row">


                                <div class="col-md-6">
                                    <label> img_identity </label>
                                    <div class="form-group">
                                        <div id="uploadOne" class="img-upload">
                                            <img src="{{ asset('assets/img/default-user.gif')}}" alt="">
                                            <div class="upload-icon">
                                                <input type="file" name="pic" class="upload">
                                                <i class="fas fa-camera    "></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">

                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">UserName </label>
                                        <input type="text" id="newClint" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">UserFullName </label>
                                        <input type="text" id="newClint" name="full_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for=""> actively date to</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            </div>
                                            <input type="text" name="hire_date" class="form-control" data-toggle="datepicker">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">UserMobile </label>
                                        <input type="text" id="newClint" name="mobile_1" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">UserMobile2 </label>
                                        <input type="text" id="newClint" name="mobile_2" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">User Phone </label>
                                        <input type="text" id="newClint" name="phone"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">Email </label>
                                        <input type="email" id="newClint" name="email" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">Address </label>
                                        <input type="text" id="newClint" name="address" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>*Role</label>
                                        <select name="role_id" class="form-control" id="">
                                            <option value="1">Admin</option>
                                            <option value="2">User</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Company</label>
                                        <select name="company_id" class="form-control" id="" required>
                                            <option value="">Select</option>
                                            @foreach ($companies as $company)
                                            <option value='{{$company->id}}'>
                                                {{ $company->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="scales" name="active" checked>
                                        <label for="scales">User Active</label>
                                    </div>
                                    <!-- <label class="custom-control-label" for="customCheck">User Active</label>
                          <input type="checkbox" class="custom-control-input" id="customCheck" name="example1"> -->
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