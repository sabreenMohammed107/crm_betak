@extends('layouts.main')

@section('title', 'Titles')


@section('crumb')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('/') }}"><i class="material-icons"></i> {{ __('links.home') }} </a></li>
        <li class="breadcrumb-item active" aria-current="page"> {{ __('links.ToDo') }} </li>
    </ol>
</nav>

@endsection

@section('content')


<div class="row">

    <div class="col-md-12">


        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
                <h6>ToDo</h6>
              
            </div>
            <div class="ms-panel-body">
<div class="row">
<div class="col-md-6">
                            <div class="form-group">
                                <label>Show All </label>
                               <input type="checkbox" id="all" onchange="getAll()" name="all"   >
                            </div>
                        </div>
</div>
                <div class="table-responsive" id="preTable">
                 @include('todoList.preIndex')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('modal')


<script>
function getAll(){
    var value = $('#all').is(':checked') ? 1 : 0;
   
    $.ajax({
        type: "Get",
        url: "{{ route('fetch_alltodoList') }}",
        data: {
            action1: value  
        },
        success: function (response) {
        
            $('#preTable').html(response);
        },
        
    });
    $(document).ready(function() {
    $('#courseEval').DataTable( {
        "scrollX": true
    } );
} );
}
</script>
@endsection
