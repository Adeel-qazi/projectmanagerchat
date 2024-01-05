   {{-- sidebar start --}}
   <div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index-2.html"> <img alt="image" src="{{asset('assets/img/logo.png')}}" class="header-logo" /> <span
            class="logo-name">Update Management</span>
        </a>
      </div>
      <div class="sidebar-user">
        <div class="sidebar-user-picture">
          <img alt="image" src="{{asset('assets/img/user.png')}}">
        </div>
        <div class="sidebar-user-details">
          <div class="user-name">{{ (auth('admin')->user() ? auth('admin')->user()->name : (auth('manager')->user() ? auth('manager')->user()->name : 'Guest')) }}</div>
          <div class="user-role">{{ (auth('admin')->user() ? 'Admin' : (auth('manager')->user() ? 'Manager' : '')) }}</div>
          {{-- <div class="sidebar-userpic-btn d-flex"> --}}
            {{-- <a href="{{ route('profile', (auth('admin')->user() ? auth('admin')->user()->id : (auth('manager')->user() ? auth('manager')->user()->id : null))) }}" class="dropdown-item has-icon">
              <i class="far fa-user"></i> Profile
            </a> --}}
            {{-- <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
              <i class="fas fa-sign-out-alt"></i> Logout
            </a> --}}
          {{-- </div> --}}
        </div>
      </div>

      <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown active">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i
              data-feather="monitor"></i><span>Dashboard</span></a>
          <ul class="dropdown-menu">
            @if (auth('admin')->check())
            <li class="active"><a class="nav-link" href="{{route('managers.index')}}">Manager</a></li>
            @endif
            {{-- <li><a class="nav-link" href="{{route('chatbox.index')}}">Chatbox</a></li> --}}
            <li><a class="nav-link" href="{{route('projects.index')}}">Project</a></li>
            {{-- <li><a class="nav-link" href="{{route('newchats.index')}}">New Chat</a></li> --}}
          </ul>
        </li>
      </ul>
    </aside>
  </div>
  {{-- sidebar end --}}