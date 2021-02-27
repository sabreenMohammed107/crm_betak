<!-- Sidebar Navigation Left -->
<aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">

 <!-- Logo -->
 <div class="logo-sn ms-d-block-lg">
   <a class="pl-0 ml-0 text-center" href="{{ route('/') }}"> <img src="{{ asset('assets/img/logo.png')}}" alt="logo"> </a>
 </div>

 <!-- Navigation -->
 <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
    <!-- Home -->
    <li class="menu-item ">
        <a class=" active" href="{{ route('/') }}">
            <span><i class="material-icons fs-16">home</i>{{ __('links.home') }} </span>
        </a>
       
    </li>
    <!-- /Home -->
     <!-- Setup  -->
     <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#create" aria-expanded="false" aria-controls="tables">
        <span><i class="material-icons fs-16">build</i>{{ __('links.setup') }} </span>
      </a>
      <ul id="create" class="collapse" aria-labelledby="tables" data-parent="#side-nav-accordion">

      <li> <a href="{{ route('titles.index') }}">{{ __('links.titles') }} </a> </li>
      <li> <a href="{{ route('countries.index') }}">{{ __('links.countries') }} </a> </li>
        <li> <a href="{{ route('cities.index') }}">{{ __('links.cities') }} </a> </li>
        <li> <a href="{{ route('fqa.index') }}">{{ __('links.fqa') }} </a> </li>
        <li> <a href="{{ route('nationalities.index') }}">{{ __('links.nationalities') }}</a> </li>
       <li> <a href="{{ route('source.index') }}">{{ __('links.reach-Source') }}</a> </li>
        <li> <a href="{{ route('activities.index') }}"> {{ __('links.activities') }}</a> </li>
        <li> <a href="{{ route('status.index')}}"> {{ __('links.status') }}</a> </li>
        <li> <a href="{{ route('services.index')}}"> {{ __('links.services') }}</a> </li>

      </ul>
  </li>
  <!--  Setup  -->

  <!--  Sending  -->
    <!-- Clients  -->
    {{--<li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#contactsdropdown" aria-expanded="false" aria-controls="contactsdropdown">
        <span><i class="material-icons fs-16">assignment</i>{{ __('links.clients') }}</span>
      </a>
        <ul id="contactsdropdown" class="collapse" aria-labelledby="basic-elements" data-parent="#side-nav-accordion">
          <li> <a href="{{ route('client.index')}}">{{ __('links.clients') }}</a> </li>
         
        </ul>
      </li>--}}
    <!--  Clients  -->
    <!-- Leads  -->
    <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#callsdropdown1" aria-expanded="false" aria-controls="callsdropdown">
        <span><i class="material-icons fs-16">call</i>{{ __('links.leads') }}</span>
      </a>
        <ul id="callsdropdown1" class="collapse" aria-labelledby="basic-elements" data-parent="#side-nav-accordion">
          <li> <a href="{{ route('lead.index')}}">{{ __('links.leads') }}</a> </li>
         
        </ul>
      </li>
    <!--  Leads  -->
    <!-- Todo List -->
    <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#callsdropdown" aria-expanded="false" aria-controls="callsdropdown">
        <span><i class="material-icons fs-16">call</i>ToDo List</span>
      </a>
        <ul id="callsdropdown" class="collapse" aria-labelledby="basic-elements" data-parent="#side-nav-accordion">
          <li> <a href="{{ route('todoList.index')}}">ToDo List</a> </li>
         
        </ul>
      </li>
      <!-- Todo List -->
    <!-- Users  -->
    @if (Auth::user()->role->name=='admin')
    <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#Usersdropdown" aria-expanded="false" aria-controls="Usersdropdown">
        <span><i class="material-icons fs-16">assignment_ind</i> {{ __('links.companies') }}/ {{ __('links.users') }}</span>
      </a>
        <ul id="Usersdropdown" class="collapse" aria-labelledby="basic-elements" data-parent="#side-nav-accordion">
          <li> <a href="{{ route('company.index')}}">{{ __('links.companies') }}</a> </li>
          <li> <a href="{{ route('crm-users.index')}}">{{ __('links.users') }}</a> </li>
         
        </ul>
      </li>
      @endif
    <!--  Users  -->


    <!-- Roles  -->
    <!-- <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#Rolesdropdown" aria-expanded="false" aria-controls="Rolesdropdown">
        <span><i class="material-icons fs-16">lock</i> {{ __('links.roles_permission') }}</span>
      </a>
        <ul id="Rolesdropdown" class="collapse" aria-labelledby="basic-elements" data-parent="#side-nav-accordion">
          <li> <a href="{{ route('roles.index') }}">{{ __('links.roles') }}</a> </li>
          <li> <a href="#">{{ __('links.permission') }}</a> </li>
         
        </ul>
      </li> -->
    <!--  Roles  --> 
     
    
    
  </ul>


</aside>