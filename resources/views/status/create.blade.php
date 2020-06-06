@section('modal')
<div class="modal fade" id="addStatus" tabindex="-1" role="dialog" aria-labelledby="addStatus">
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

		

				{{ Form::open(['route'=>'status.store' ]) }}
		<div class="ms-auth-container row">
			<div class="col-md-12">
				<div class="form-group">
					{!! Form::label('name',__('titles.status')) !!}
	               
	                <div class="input-group">
	            		{!! Form::text('name', null, array('class'=>'form-control') ) !!}        
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