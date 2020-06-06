@extends('layouts.main')

@section('title', 'Titles')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('/') }}"><i class="material-icons"></i> {{ __('links.home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('links.fqa') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="ms-panel">
		<div class="ms-panel-header d-flex justify-content-between">
			<h6>{{ __('titles.fqaView') }}</h6>
			<a  href="#" class="btn btn-dark" data-toggle="modal" data-target="#addFqa"> {{ __('links.add') }}  </a>
		</div>
		<div class="ms-panel-body">
                  <div class="accordion has-gap ms-accordion-chevron" id="accordionExample2">
				  @foreach($data as $row)
                 
                    <div class="card">
                      <div class="card-header d-flex justify-content-between collapsed" data-toggle="collapse" role="button" data-target="#collapseSix-{{$row->id}}" aria-expanded="false" aria-controls="collapseSix-{{$row->id}}">
                        <span> {{ $row->question }} </span>
                        <div>
                          <!-- <a href="#"  data-toggle="modal" data-target="#addFAQ" 
                        class="btn d-inline-block mt-0 btn-info">edit</a>
                      <a href="#" onclick="delette('this Question');" class="btn mr-4 mt-0 d-inline-block btn-danger">delete</a
                        href="#"> -->
						<a href="{{ route('fqa.edit', $row->id) }}" class="btn d-inline-block btn-info">{{ __('links.edit') }} </a>


<a href="#" onclick="destroy('this FQA', '{{$row->id}}')" class="btn d-inline-block btn-danger">{{ __('links.delete') }} </a>

<form id="delete_{{$row->id}}" action="{{ route('fqa.destroy', $row->id) }}"  method="POST" style="display: none;">
@csrf
@method('DELETE')
<button type="submit" value=""></button>
</form>
                        </div>
                      </div>
    
                      <div id="collapseSix-{{$row->id}}" class="collapse" data-parent="#accordionExample2">
                        <div class="card-body">
						{{ $row->answer }}
                        </div>
                      </div>
                    </div>
					@endforeach
                  </div>
                </div>
              </div>
		</div>
	</div>
</div>

@endsection
@section('modal')
<!-- Add Model -->
<div class="modal fade" id="addFqa" tabindex="-1" role="dialog" aria-labelledby="addFqa">

    <div class="modal-dialog modal-lg " role="document">
      <div class="modal-content">

        <div class="modal-body">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <div class="ms-auth-container row no-gutters">
              <div class="col-12 p-3">
                  <form action="{{route('fqa.store')}}" method="POST">
                  @csrf
                      <div class="ms-auth-container row">
    
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label  >{{ __('titles.question') }}</label>
                                  <div class="input-group">
                                      <input type="text" id="newTitle" name="question" class="form-control"
                                         placeholder="question">
                                  </div>
                              </div>
                          </div>
						  <div class="col-md-12">
                              <div class="form-group">
                                  <label  >{{ __('titles.answer') }}</label>
                                  <div class="input-group">
                                      <input type="textarea" id="newTitle" name="answer" class="form-control"
                                         placeholder="answer">
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