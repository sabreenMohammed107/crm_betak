@extends('layouts.main')
@section('title', 'Contacts titles')
@section('content')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('/')}}"><i class="material-icons">home</i> {{ __('links.home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('links.titles') }} </li>
    </ol>
  </nav>


  <div class="row">

    <div class="col-md-12">
     


        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
              <h6>ُContact titles</h6>
              <a  href="#" class="btn btn-dark" data-toggle="modal" data-target="#addTitle"> {{ __('links.add') }}  </a>
            </div>
            <div class="ms-panel-body">
              <div class="table-responsive">
                    <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                            <thead>
                              <th>title</th>
                             
                              <th> </th>
                            </thead>
                            <tbody>
          
                              <tr>
                                <td>Mr</td>
          
                                 
                                 
                                 
                                  
                                 
                                  <td>
                                    <a href="#" data-toggle="modal" data-target="#addTitle" class="btn d-inline-block btn-info">{{ __('links.edit') }} </a>
                                    <a href="#" onclick="delette('this title');" class="btn d-inline-block btn-danger">{{ __('links.delete') }} </a href="#">
                                  </td>
                              </tr>
          
                            </tbody>
                          </table>
              </div>
            </div>
          </div>
        
         
      
    
    </div>

  </div>


@endsection

@section('modal')
<div class="modal fade" id="addTitle" tabindex="-1" role="dialog" aria-labelledby="addCourse">

    <div class="modal-dialog modal-lg " role="document">
      <div class="modal-content">

        <div class="modal-body">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <div class="ms-auth-container row no-gutters">
              <div class="col-12 p-3">
                  <form action="">
                    
                      <div class="ms-auth-container row">
    
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label  >Title</label>
                                  <div class="input-group">
                                      <input type="text" id="newTitle" class="form-control"
                                         placeholder="title">
                                  </div>
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


    @endsection