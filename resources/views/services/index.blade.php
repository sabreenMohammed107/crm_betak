@extends('layouts.main')

@section('title', 'Services')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('/') }}"><i class="material-icons"></i> {{ __('links.home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('links.services') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="ms-panel">
		<div class="ms-panel-header d-flex justify-content-between">
			<h6>{{ __('links.services') }}</h6>
			<a  href="#" class="btn btn-dark" data-toggle="modal" data-target="#addService" > {{ __('links.add') }}  </a>
		</div>
			<div class="ms-panel-body">
				<div class="table-responsive">
					<table id="courseEval" class="dattable table table-striped thead-dark  w-100">
						<thead>
							<th>{{ __('titles.id') }}</th>
							<th>{{ __('titles.service') }}</th>
							<th>{{ __('titles.actions') }}</th>
						</thead>
						<tbody>
							<?php $index = 1; ?>
							@foreach($data as $row)
							<tr>
								<td>{{ $index }}</td>
								<td>{{ $row->text }}</td>
								<td>
									<a href="{{ route('services.edit', $row->id) }}" class="btn d-inline-block btn-info">{{ __('links.edit') }} </a>


									<a href="#" onclick="destroy('this Activity', '{{$row->id}}')" class="btn d-inline-block btn-danger">{{ __('links.delete') }} </a>

									<form id="delete_{{$row->id}}" action="{{ route('services.destroy', $row->id) }}"  method="POST" style="display: none;">
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
@include('services.create')