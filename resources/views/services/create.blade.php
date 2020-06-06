@section('modal')
<div class="modal fade" id="addService" tabindex="-1" role="dialog" aria-labelledby="addService">
    <div class="modal-dialog modal-lg " role="document">
      <div class="modal-content">

        <div class="modal-body">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
          <div class="ms-auth-container row no-gutters">
            <div class="col-12 p-3">
       			
           

				@if (count($errors) > 0)
				<div class="alert alert-danger">
				    <ul>
				        @foreach ($errors->all() as $error)
				        <li>{{ $error }}</li>
				        @endforeach
				    </ul>
				</div>
				@endif

		

				{{ Form::open(['route'=>'services.store' ]) }}
		<div class="ms-auth-container row">
			<div class="col-md-12">
				<div class="form-group">
					{!! Form::label('text',__('titles.service')) !!}
	               
	                <div class="input-group">
	            		{!! Form::text('text', null, array('class'=>'form-control') ) !!}        
	                </div>
				</div>
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

		
		
	           	<div class="input-group d-flex justify-content-end text-center">
                        {!! Form::button('Cancel', array('class'=>'btn btn-dark mx-2','data-dismiss'=>'modal','aria-label'=>'Close') ) !!} 
	            		{!! Form::submit('Save Data', array('class'=>'btn btn-success') ) !!}        
	                
	            </div>
	          
				{{ Form::close() }}
			</div>
		</div>
	  </div>

	</div>
  </div>
</div>

@endsection