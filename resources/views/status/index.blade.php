@extends('layouts.main')

@section('title', 'Activities')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('/') }}"><i class="material-icons"></i> {{ __('links.home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('links.status') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="ms-panel">
		<div class="ms-panel-header d-flex justify-content-between">
			<h6>{{ __('links.status') }}</h6>
			<a  href="#" class="btn btn-dark" data-toggle="modal" data-target="#addStatus" > {{ __('links.add') }}  </a>
		</div>
			<div class="ms-panel-body">
				<div class="table-responsive">
					<table id="courseEval" class="dattable table table-striped thead-dark  w-100">
						<thead>
							<th>{{ __('titles.id') }}</th>
							<th>{{ __('titles.status') }}</th>
							<th>{{ __('titles.actions') }}</th>
						</thead>
						<tbody>
							<?php $index = 1; ?>
							@foreach($data as $row)
							<tr>
								<td>{{ $index }}</td>
								<td>{{ $row->name }}</td>
								<td>
									<a href="{{ route('status.edit', $row->id) }}" class="btn d-inline-block btn-info">{{ __('links.edit') }} </a>


									<a href="#" onclick="destroy('this Contact status', '{{$row->id}}')" class="btn d-inline-block btn-danger">{{ __('links.delete') }} </a>

									<form id="delete_{{$row->id}}" action="{{ route('status.destroy', $row->id) }}"  method="POST" style="display: none;">
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
@include('status.create')