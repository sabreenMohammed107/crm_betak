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
                  <h6>ُCompanies</h6>
                  <a href="#" data-toggle="modal" data-target="#addCompany" class="btn btn-dark"> Add new </a>
                </div>
                <div class="ms-panel-body">
                  <div class="table-responsive">
                        <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                                <thead>
                                <th>#</th>
                                  <th>Logo</th>
                                  <th>Name</th>
                                  <th>Creation Date</th>
                                  <th>Address</th>
                                  <th>Mobile1 </th>
                                  <th>Mobile2 </th>
                                  <th>Phone</th>
                                  <th>Email</th>
                                  <th> </th>
                                </thead>
                                <tbody>
                                @foreach($rows as $index => $row)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td><img  src="{{ asset('uploads/')}}/{{ $row->logo }}" alt=""></td>
              
                                      <td>
                                      {{$row->name}}                          
                                      </td>
                                      <td>
                                      <?php $date = date_create($row->created_date) ?>
                                    {{ date_format($date,"d-m-Y") }}      
                                      </td>
                                      <td>
                                      {{$row->address}}         
                                      </td>
                                      <td>
                                      {{$row->mobile_1}}         
                                      </td>
                                      <td>
                                      {{$row->mobile_2}}         
                                      </td>
                                      <td>
                                      {{$row->phone}}         
                                      </td>
                                      <td>
                                      {{$row->email}}         
                                      </td>
                                    
                                    <td>
                                       
                                      <a href="{{ route('company.edit',$row->id) }}" class="btn btn-info d-inline-block" 
                           >edit</a>
                           <a href="{{ route('company.show',$row->id) }}" class="btn btn-primary d-inline-block">view</a>
                        <a href="#" onclick="destroy('this row','{{$row->id}}')" class="btn d-inline-block btn-danger">delete</a>
                        <form id="delete_{{$row->id}}" action="{{ route('company.destroy', $row->id) }}"  method="POST" style="display: none;">
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

    
@endsection
@section('modal')

 <!-- Add clints Modal -->
 <div class="modal fade" id="addCompany" tabindex="-1" role="dialog" aria-labelledby="addClint">
    <div class="modal-dialog modal-lg " role="document">
      <div class="modal-content">

        <div class="modal-body">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
          <div class="ms-auth-container row no-gutters">
            <div class="col-12 p-3">
            <form action="{{route('company.store')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}


                <div class="ms-auth-container row">

                    <div class="col-md-6">
                    
                      <div class="form-group d-flex">
                          <label for=""> logo</label>
                          <div id="uploadOne" class="img-upload">
                          <img src="{{ asset('assets/img/default-user.gif')}}" alt="">
                          <div class="upload-icon">
                            <input type="file" name="pic" class="upload">
                            <i class="fas fa-camera    "></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label >Name </label>
                        <input type="text" id="Cname" name="name" class="form-control" placeholder="name">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label >Address </label>
                        <input type="text" id="CAddress" name="address" class="form-control" placeholder="Address">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label >Mobile1 </label>
                        <input type="text" id="CMobile1" name="mobile_1" class="form-control" placeholder="Mobile1">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label >Mobile2 </label>
                        <input type="text" id="CMobile2" name="mobile_2" class="form-control" placeholder="Mobile2">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label >Phone </label>
                        <input type="text" id="CPhone" name="phone" class="form-control" placeholder="Phone">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label >Email </label>
                        <input type="email" id="CEmail" name="email" class="form-control" placeholder="Email">
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