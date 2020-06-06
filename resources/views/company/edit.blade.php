@extends('layouts.main')

@section('title', 'Titles')


@section('crumb')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('/') }}"><i class="material-icons"></i> {{ __('links.home') }} </a></li>
        <li class="breadcrumb-item active" aria-current="page"> {{ __('links.companies') }} </li>
    </ol>
</nav>

@endsection

@section('content')
<div class="row">

    <div class="col-md-12">



        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
                <h6>ُEdit Company</h6>
            </div>
            <div class="ms-panel-body">
                <form action="{{route('company.update',$row->id)}}" method="POST">
                    {{ csrf_field() }}

                    @method('PUT')

                    <div class="ms-auth-container row">

                        <div class="col-md-4 col-sm-6">

                            <div class="form-group d-flex">
                                <label for=""> logo</label>
                                <div class="img-upload mx-1">
                                    <img src="{{ asset('uploads/')}}/{{ $row->logo }}" alt="">
                                    <div class="upload-icon">
                                        <input type="file" name="pic" class="upload">
                                        <i class="fas fa-camera    "></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label>Name </label>
                                <input type="text" id="Cname" name="name" value="{{$row->name}}" class="form-control" placeholder="name">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label>Address </label>
                                <input type="text" id="CAddress" name="address" value="{{$row->address}}" class="form-control" placeholder="Address">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label>Mobile1 </label>
                                <input type="text" id="CMobile1" name="mobile_1" value="{{$row->mobile_1}}" class="form-control" placeholder="Mobile1">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label>Mobile2 </label>
                                <input type="text" id="CMobile2" name="mobile_2" value="{{$row->mobile_2}}" class="form-control" placeholder="Mobile2">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label>Phone </label>
                                <input type="text" id="CPhone" name="phone" value="{{$row->phone}}" class="form-control" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label>Email </label>
                                <input type="email" value="{{$row->email}}" name="email" id="CEmail" class="form-control" placeholder="Email">
                            </div>
                        </div>


                    </div>

                    <div class="input-group d-flex justify-content-end text-center">
                    <a href="{{route('company.index')}}" class="btn btn-dark mx-2"> Cancel</a>
                                            <input type="submit" value="save" class="btn btn-success ">
                    </div>
                </form>
                <hr>
                <div class="users-container my-2">
                    <div class="d-flex justify-content-end">
                        <!-- <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addUser"> add user </a> -->

                    </div>
                    <div class="table-responsive">
                        <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">User</th>

                                    <th scope="col">User Role</th>

                                    <th scope="col"></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $index => $user)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->role->name}}</td>



                                    <td>
                                        <a href="#" class="btn btn-info d-inline-block" data-toggle="modal" data-target="#addUser{{$user->id}}">view</a>
                                        <!-- <a href="#" onclick="delette('this user from this company');" class="btn d-inline-block btn-danger">delete</a> -->
                                    </td>

                                </tr>

                                <!-- view user -->
                                <div class="modal fade" id="addUser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">

                                            <div class="modal-body">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <div class="ms-auth-container row no-gutters">
                                                    <div class="col-12 p-3">
                                                        <form action="">


                                                            <div class="ms-auth-container row">

                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <div class="img-upload">
                                                                            <img src="{{ asset('uploads/')}}/{{ $user->image }}" alt="">
                                                                            <div class="upload-icon">
                                                                                <input type="file" name="pic" class="upload">
                                                                                <i class="fa fa-camera"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">

                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="exampleInputPassword1" for="exampleCheck1">UserName </label>
                                                                        <input type="text" id="newClint" readonly name="name" value="{{$user->name}}" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="exampleInputPassword1" for="exampleCheck1">UserFullName </label>
                                                                        <input type="text" id="newClint" readonly name="full_name" value="{{$user->full_name}}" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for=""> actively date to</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                                            </div>
                                                                            <input type="text" name="hire_date" readonly value="{{$user->hire_date}}" class="form-control" data-toggle="datepicker">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="exampleInputPassword1" for="exampleCheck1">UserMobile </label>
                                                                        <input type="text" id="newClint" readonly name="mobile_1" value="{{$user->mobile_1}}" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="exampleInputPassword1" for="exampleCheck1">UserMobile2 </label>
                                                                        <input type="text" id="newClint" readonly name="mobile_2" value="{{$user->mobile_2}}" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="exampleInputPassword1" for="exampleCheck1">Email </label>
                                                                        <input type="email" id="newClint" name="email" readonly value="{{$user->email}}" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="exampleInputPassword1" for="exampleCheck1">Address </label>
                                                                        <input type="text" id="newClint" name="address" readonly value="{{$user->address}}" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>*Role</label>
                                                                        <select name="role_id" class="form-control" id="" readonly>
                                                                            <option value="">
                                                                                @if($user->role_id==1)
                                                                                Admin
                                                                                @else
                                                                                User
                                                                                @endif
                                                                            </option>
                                                                          

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Company</label>
                                                                        <select name="company_id" class="form-control" id="" readonly >
                                                                            <option value=""> @if($user->company)
                                                                                {{ $user->company->name}}

                                                                                @endif</option>
                                                                          
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <div class="custom-control custom-checkbox">
                                                                        @if($user->active == 1)
                                                                        <input type="checkbox" id="" readonly name="active" checked>
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
                                                        <!-- <input type="submit" value="Add" class="btn btn-success "> -->
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- End view user -->
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

@endsection