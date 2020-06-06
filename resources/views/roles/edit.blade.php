@extends('layouts.main')

@section('title', 'Roles')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('/') }}"><i class="material-icons"></i> {{ __('links.home') }} </a></li>
      <li class="breadcrumb-item"><a href="{{ route('roles.index') }}"><i class="material-icons"></i> {{ __('links.role') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('title.rolesEdit') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="ms-panel">
			<div class="ms-panel-header d-flex justify-content-between">
				<h6>{{ __('titles.rolesEdit') }}</h6>
				<a  href="{{ route('roles.index') }}" class="btn btn-danger"> {{ __('links.back') }}  </a>
			</div>
			<div class="ms-panel-body col-md-6 col-md-offset-2">

				@if (count($errors) > 0)
				<div class="alert alert-danger">
				    <ul>
				        @foreach ($errors->all() as $error)
				        <li>{{ $error }}</li>
				        @endforeach
				    </ul>
				</div>
				@endif

				{{ Form::model($data, [ 'method'=> 'PUT', 'route'=> ['roles.update', $data->id] ]) }}

				<div class="form-group">
	                {!! Form::label('name','Enter Role Name') !!}
	                <div class="input-group">
	            		{!! Form::text('name', null, array('class'=>'form-control') ) !!}        
	                </div>
	            </div>
	            
	           	<div class="form-group">
	                <div class="input-group">
	            		{!! Form::submit('Save Data', array('class'=>'btn btn-success') ) !!}        
	                </div>
	            </div>
	            
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>

@endsection