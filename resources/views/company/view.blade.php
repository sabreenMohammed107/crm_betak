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
                <form action="">
                  
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
                                <input type="text" id="Cname" name="name" readonly value="{{$row->name}}" class="form-control" placeholder="name">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label>Address </label>
                                <input type="text" id="CAddress" name="address" readonly value="{{$row->address}}" class="form-control" placeholder="Address">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label>Mobile1 </label>
                                <input type="text" id="CMobile1" name="mobile_1" readonly value="{{$row->mobile_1}}" class="form-control" placeholder="Mobile1">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label>Mobile2 </label>
                                <input type="text" id="CMobile2" name="mobile_2" readonly value="{{$row->mobile_2}}" class="form-control" placeholder="Mobile2">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label>Phone </label>
                                <input type="text" id="CPhone" name="phone" readonly value="{{$row->phone}}" class="form-control" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label>Email </label>
                                <input type="email" value="{{$row->email}}" readonly name="email" id="CEmail" class="form-control" placeholder="Email">
                            </div>
                        </div>


                    </div>

                  
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
                                        <!-- <a href="#" class="btn btn-info d-inline-block" data-toggle="modal" data-target="#addUser{{$user->id}}">view</a> -->
                                        <!-- <a href="#" onclick="delette('this user from this company');" class="btn d-inline-block btn-danger">delete</a> -->
                                    </td>

                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>


        <div class="input-group d-flex justify-content-end text-center">
                    <a href="{{route('company.index')}}" class="btn btn-dark mx-2"> Cancel</a>
                                            <input type="submit" value="save" class="btn btn-success ">
                    </div>
                </form>

    </div>

</div>

@endsection
@section('modal')

@endsection