<!-- HEADER Navigation Bar -->
<nav class="navbar ms-navbar">

  <div class="ms-aside-toggler ms-toggler pl-0" data-target="#ms-side-nav" data-toggle="slideLeft">
    <span class="ms-toggler-bar bg-primary"></span>
    <span class="ms-toggler-bar bg-primary"></span>
    <span class="ms-toggler-bar bg-primary"></span>
  </div>

  <div class="logo-sn logo-sm ms-d-block-sm">
    <a class="pl-0 ml-0 text-center navbar-brand mr-0" href="{{route('/')}}"><img src="{{asset('public/assets/img/logo-sm-dark.png')}}" alt="logo"> </a>
  </div>

  <ul class="ms-nav-list ms-inline mb-0" id="ms-nav-options">
    <li class="ms-nav-item  quick-call  mt-2">
      <!-- <a href="bulk-search.html" class="">
        <span class="text-dark"><i class="material-icons fs-16">search</i><b>{{ __('links.msearch') }} </b></span>
      </a> -->
    </li>
    <li class="ms-nav-item  quick-call  mt-2">
      <!-- <a href="Qkcall.html" class="">
        <span class="text-dark"><i class="material-icons fs-16">call</i><b>{{ __('links.qkCall') }}</b></span>
      </a> -->
    </li>
    <li class="ms-nav-item dropdown ms-search-form">
      <form class="ms-form" method="post">
        <div class="ms-form-group my-0 mb-0 has-icon fs-14">
          <!-- <input type="search" class="ms-form-input" id="quickCallSearch" name="search" placeholder="Search here..." value=""> -->
          <!-- <button type="submit" class="search-btn"><i class="flaticon-search text-disabled"></i></button> -->
        </div>
      </form>
      <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="mailDropdown" id="quickCall_List">

        <li class="ms-scrollable ms-dropdown-list">
          <a class="media p-2" href="profile.html">
            <div class=" ms-chat-img mr-2 align-self-center">
              <img src="https://via.placeholder.com/270x270" class="ms-img-round" alt="people">
            </div>
            <div class="media-body">
              <span>Mohammad .</span>
            </div>
          </a>
          <a class="media p-2" href="profile.html">
            <div class=" ms-chat-img mr-2 align-self-center">
              <img src="https://via.placeholder.com/270x270" class="ms-img-round" alt="people">
            </div>
            <div class="media-body">
              <span>Mohammad .</span>
            </div>
          </a>
          <a class="media p-2" href="profile.html">
            <div class=" ms-chat-img mr-2 align-self-center">
              <img src="https://via.placeholder.com/270x270" class="ms-img-round" alt="people">
            </div>
            <div class="media-body">
              <span>Mohammad .</span>
            </div>
          </a>
          <a class="media p-2" href="profile.html">
            <div class=" ms-chat-img mr-2 align-self-center">
              <img src="https://via.placeholder.com/270x270" class="ms-img-round" alt="people">
            </div>
            <div class="media-body">
              <span>Mohammad .</span>
            </div>
          </a>
          <a class="media p-2" href="profile.html">
            <div class=" ms-chat-img mr-2 align-self-center">
              <img src="https://via.placeholder.com/270x270" class="ms-img-round" alt="people">
            </div>
            <div class="media-body">
              <span>Mohammad .</span>
            </div>
          </a>
          <a class="media p-2" href="profile.html">
            <div class=" ms-chat-img mr-2 align-self-center">
              <img src="https://via.placeholder.com/270x270" class="ms-img-round" alt="people">
            </div>
            <div class="media-body">
              <span>Mohammad .</span>
            </div>
          </a>
          <a class="media p-2" href="profile.html">
            <div class=" ms-chat-img mr-2 align-self-center">
              <img src="https://via.placeholder.com/270x270" class="ms-img-round" alt="people">
            </div>
            <div class="media-body">
              <span>Mohammad .</span>
            </div>
          </a>
          <a class="media p-2" href="profile.html">
            <div class=" ms-chat-img mr-2 align-self-center">
              <img src="https://via.placeholder.com/270x270" class="ms-img-round" alt="people">
            </div>
            <div class="media-body">
              <span>Mohammad .</span>
            </div>
          </a>


        </li>
      </ul>
    </li>
    <li class="ms-nav-item  mt-2">
      <div class='switch' style="display: none;">
        <div class='quality'>
          <input checked id='q1' name='q' type='radio' value='q1'>
          <label for='q1'>EN</label>
        </div>
        <div class='quality'>
          <input id='q2' name='q' type='radio' value='q2'>
          <label for='q2'>AR</label>
        </div>
      </div>
    </li>

    <li class="ms-nav-item dropdown mt-2">
      <!-- <a href="#" class="text-disabled ms-has-notification" id="mailDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span>10</span>
        <i class="flaticon-speech-bubble"></i></a> -->
      <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="mailDropdown">
        <li class="dropdown-menu-header">
          <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Messages</span></h6><span class="badge badge-pill badge-success">3 New</span>
        </li>
        <li class="dropdown-divider"></li>
        <li class="ms-scrollable ms-dropdown-list">
          <a class="media p-2" href="chat.html">
            <div class="ms-chat-status ms-status-offline ms-chat-img mr-2 align-self-center">
              <img src="https://via.placeholder.com/270x270" class="ms-img-round" alt="people">
            </div>
            <div class="media-body">
              <span>Hey man, looking forward to your new project.</span>
              <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 30 seconds ago</p>
            </div>
          </a>
          <a class="media p-2" href="chat.html">
            <div class="ms-chat-status ms-status-online ms-chat-img mr-2 align-self-center">
              <img src="https://via.placeholder.com/270x270" class="ms-img-round" alt="people">
            </div>
            <div class="media-body">
              <span>Dear John, I was told you bought Mystic! Send me your feedback</span>
              <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 28 minutes ago</p>
            </div>
          </a>
          <a class="media p-2" href="chat.html">
            <div class="ms-chat-status ms-status-offline ms-chat-img mr-2 align-self-center">
              <img src="https://via.placeholder.com/270x270" class="ms-img-round" alt="people">
            </div>
            <div class="media-body">
              <span>How many people are we inviting to the dashboard?</span>
              <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 6 hours ago</p>
            </div>
          </a>
        </li>
        <li class="dropdown-menu-footer text-center">
          <!-- <a href="chat.html">{{ __('links.allMessages') }} </a> -->
        </li>
      </ul>
    </li>

    <li class="ms-nav-item dropdown mt-2">
      <!-- <a href="#" class="text-disabled ms-has-notification" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span>36</span>
        <i class="flaticon-bell"></i></a> -->
      <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationDropdown">
        <li class="dropdown-menu-header">
          <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Notifications</span></h6><span class="badge badge-pill badge-info">4 New</span>
        </li>
        <li class="dropdown-divider"></li>
        <li class="ms-scrollable ms-dropdown-list">
          <a class="media p-2" href="#">
            <div class="media-body">
              <span>12 ways to improve your crypto dashboard</span>
              <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 30 seconds ago</p>
            </div>
          </a>
          <a class="media p-2" href="#">
            <div class="media-body">
              <span>You have newly registered users</span>
              <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 45 minutes ago</p>
            </div>
          </a>
          <a class="media p-2" href="#">
            <div class="media-body">
              <span>Your account was logged in from an unauthorized IP</span>
              <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 2 hours ago</p>
            </div>
          </a>
          <a class="media p-2" href="#">
            <div class="media-body">
              <span>An application form has been submitted</span>
              <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 1 day ago</p>
            </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-menu-footer text-center">
          <!-- <a href="notifications.html">{{ __('links.allNotifications') }} </a> -->
        </li>
      </ul>
    </li>

    <li class="ms-nav-item ms-nav-user dropdown">
      <a href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="ms-user-img ms-img-round float-left" src="https://via.placeholder.com/270x270" alt="people">
        <span class="float-right"> @if (Auth::user()){{ Auth::user()->name }} {{ Auth::user()->full_name }}@endif</span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right user-dropdown" aria-labelledby="userDropdown">
        <li class="dropdown-menu-header">
          <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Welcome,@if (Auth::user()) {{ Auth::user()->name }}@endif</span></h6>
        </li>
        @if (Auth::user()->role->name=='admin')
        
        <li class="dropdown-divider"></li>
        <li class="ms-dropdown-list">

        
            <a class="media fs-14 p-2" href="{{ route('crm-users.index')}}"> <span><i class="flaticon-user mr-2"></i>Users-List</span>
            </a>

        </li>
        @endif
        <li class="dropdown-divider"></li>
        <li class="dropdown-menu-footer">
          <a class="media fs-14 p-2" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            <span><i class="flaticon-shut-down mr-2"></i> Logout</span>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form> </a>
        </li>
      </ul>
    </li>
  </ul>

  <div class="ms-toggler ms-d-block-sm pr-0 ms-nav-toggler" data-toggle="slideDown" data-target="#ms-nav-options">
    <span class="ms-toggler-bar bg-primary"></span>
    <span class="ms-toggler-bar bg-primary"></span>
    <span class="ms-toggler-bar bg-primary"></span>
  </div>

</nav>
<!-- HEADER Navigation Bar   -->