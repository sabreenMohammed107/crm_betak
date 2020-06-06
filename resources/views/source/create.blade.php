@section('modal')
<div class="modal fade" id="addSource" tabindex="-1" role="dialog" aria-labelledby="addCity">
    <div class="modal-dialog modal-lg " role="document">
      <div class="modal-content">

        <div class="modal-body">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
          <div class="ms-auth-container row no-gutters">
			<div class="ms-auth-container row">

				
            <div class="col-md-12 ">

				@if (count($errors) > 0)
				<div class="alert alert-danger">
				    <ul>
				        @foreach ($errors->all() as $error)
				        <li>{{ $error }}</li>
				        @endforeach
				    </ul>
				</div>
				@endif


				{{ Form::open(['route'=>'source.store' ]) }}

				<div class="form-group">
					{!! Form::label('name',__('titles.source')) !!}
	               
	                <div class="input-group">
	            		{!! Form::text('name', null, array('class'=>'form-control') ) !!}        
	                </div>
	            </div>
	            
	           	<div class="input-group d-flex justify-content-end text-center">
	                <div class="input-group">
	            		{!! Form::submit('Save Data', array('class'=>'btn btn-success') ) !!}        
	                </div>
	            </div>
	            
				{{ Form::close() }}
				
				
			  </div>
			</div>
		  </div>
  
		</div>
	  </div>
	</div>

@endsection