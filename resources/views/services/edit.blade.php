@extends('layouts.main')

@section('title', 'Activities')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('/') }}"><i class="material-icons"></i> {{ __('links.home') }} </a></li>
      <li class="breadcrumb-item"><a href="{{ route('services.index') }}"><i class="material-icons"></i> {{ __('links.services') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('titles.servicesEdit') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="ms-panel">
			<div class="ms-panel-header d-flex justify-content-between">
				<h6>{{ __('titles.servicesEdit') }}</h6>
				<a  href="{{ route('services.index') }}" class="btn btn-danger"> {{ __('links.back') }}  </a>
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

				{{ Form::model($data, [ 'method'=> 'PUT', 'route'=> ['services.update', $data->id] ]) }}

				<div class="form-group">
	                {!! Form::label('text',__('titles.service')) !!}
	                <div class="input-group">
	            		{!! Form::text('text', null, array('class'=>'form-control') ) !!}        
	                </div>
				</div>
				
				<div class="ms-auth-container row">
					<div class="col-md-12">
						<div class="form-group">
							{!! Form::label('service_type',__('titles.type')) !!}
		
							<div class="input-group">
							{!! Form::select('service_type',['0' => 'Leads Service', '1' => 'Clients Service'], null,
							[
							   "class" => "form-control",
							   "placeholder" => "choose Service..."
							]) !!}
							</div>
						</div>
					</div>
				</div>
		
		
				<div class="ms-auth-container row">
					<div class="col-md-12">
						<div class="form-group">
							{!! Form::label('description',__('titles.description')) !!}
						   
							<div class="input-group">
								{!! Form::textarea('description', null, array('class'=>'form-control','cols' => 20, 'rows' =>10,) ) !!}        
							</div>
						</div>
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