@extends('layouts.main')

@section('title', 'Titles')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('/') }}"><i class="material-icons"></i> {{ __('links.home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('links.countries') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="ms-panel">
		<div class="ms-panel-header d-flex justify-content-between">
			<h6>{{ __('titles.countryView') }}</h6>
			<a  href="#" class="btn btn-dark" data-toggle="modal" data-target="#addTitle"> {{ __('links.add') }}  </a>
		</div>
			<div class="ms-panel-body">
				<div class="table-responsive">
					<table id="courseEval" class="dattable table table-striped thead-dark  w-100">
						<thead>
							<th>{{ __('titles.id') }}</th>
							<th>{{ __('titles.name') }}</th>
							<th>{{ __('titles.actions') }}</th>
						</thead>
						<tbody>
							<?php $index = 1; ?>
							@foreach($data as $row)
							<tr>
								<td>{{ $index }}</td>
								<td>{{ $row->name }}</td>
								<td>
									<a href="{{ route('countries.edit', $row->id) }}" class="btn d-inline-block btn-info">{{ __('links.edit') }} </a>


									<a href="#" onclick="destroy('this title', '{{$row->id}}')" class="btn d-inline-block btn-danger">{{ __('links.delete') }} </a>

									<form id="delete_{{$row->id}}" action="{{ route('countries.destroy', $row->id) }}"  method="POST" style="display: none;">
									@csrf
									@method('DELETE')
									<button type="submit" value=""></button>
									</form>
								</td>
							</tr>
							<?php $index++; ?>
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
<!-- Add Model -->
<div class="modal fade" id="addTitle" tabindex="-1" role="dialog" aria-labelledby="addCourse">

    <div class="modal-dialog modal-lg " role="document">
      <div class="modal-content">

        <div class="modal-body">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <div class="ms-auth-container row no-gutters">
              <div class="col-12 p-3">
                  <form action="{{route('countries.store')}}" method="POST">
                  @csrf
                      <div class="ms-auth-container row">
    
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label  >{{ __('titles.country') }}</label>
                                  <div class="input-group">
                                      <input type="text" id="newTitle" name="name" class="form-control"
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
<!-- end model -->