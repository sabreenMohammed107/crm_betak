@extends('layouts.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href=""><i class="material-icons"></i> {{ __('links.home') }} </a></li>
    </ol>
  </nav>

@endsection

@section('content')

<div class="row">

<div class="col-md-12">
 


    <div class="ms-panel">
        <div class="ms-panel-header d-flex justify-content-between">
          <h6>ُCourse Evaluation Per Track</h6>
          <a href="tracks-evaluations-details.html" class="btn btn-warning">{{ __('links.tracks') }} </a>
        </div>
        <div class="ms-panel-body">
          <div class="table-responsive">
                <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                        <thead>
                          <th>Topic</th>
                          <th>Topics Explanation</th>
                          <th>Topics Preperation</th>
                          <th>Trainer Attiude</th>
                          <th>Time Respect </th>
                          <th>Topics Commitment</th>
                          <th>Students Interaction</th>
                          <th>Overall Evaluation</th>
                          <th>Total</th>
                          <th>note </th>
                        </thead>
                        <tbody>
      
                          <tr>
                            <td>HTML</td>
      
                              <td>
                                <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>
                              </td>
                              <td>
                                <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>
                              </td>
                              <td>
                                <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>
                              </td>
                              <td>
                                <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>
                              </td>
                              <td>
                                <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>
                              </td>
                              <td>
                                <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>
                              </td>
                              <td>
                                <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>
                              </td>
                             
                              
                              <td>
                                  <div
                                  class="progress-circle"
                                  data-value="0.70"
                                  data-size="50"
                                  data-thickness="3"
                                  data-animation-start-value="1.0"
                                  data-fill="{
                                    &quot;color&quot;: &quot;green&quot;
                                  }"
                                  data-reverse="true">
                                  <div class="percent">
                                      70%
                                  </div>
                                </div>
                              </td>
                              <td class="note">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus fugit nos
                              </td>
                          </tr>
      
                        </tbody>
                      </table>
          </div>
        </div>
      </div>
    
     
  

</div>

</div>
@endsection