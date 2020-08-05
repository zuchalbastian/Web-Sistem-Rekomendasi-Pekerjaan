<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{ url('/home') }}">
        <img class="navbar-brand-full" src="{{ asset('logo/si-kom.png') }}" width="140" alt="Modulr Logo">
        <img class="navbar-brand-minimized" src="{{ asset('logo/si.png') }}" width="47" alt="Modulr Logo">
    </a>
    {{-- <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button> --}}
    <ul class="nav navbar-nav d-md-down-none">
        <li class="nav-item px-3">
          <a class="nav-link" href="/home">Dashboard</a>
        </li>
        <div class="dropdown">
            <button class="btn dropdown-toggle text-muted" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Resume
            </button>
            <div class="dropdown-menu">
              <h6 class="dropdown-header">Dropdown Resume</h6>
              <a class="dropdown-item" href="/resume/create">
                  <i class="fa fa-plus"></i> Create New Resume
              </a>
              <a class="dropdown-item" href="/resume">
                <i class="fa fa-paper-plane"></i> Document Resume
              </a>
            </div>
        </div>
        {{-- <div class="dropdown">
            <button class="btn dropdown-toggle text-muted" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Result
            </button>
            <div class="dropdown-menu">
              <h6 class="dropdown-header">Dropdown Result</h6>
              <a class="dropdown-item" href="/transform/create">
                  <i class="fa fa-pencil"></i> Create Result
              </a>
              <a class="dropdown-item" href="/transform">
                <i class="fa fa-bookmark"></i> Document Result
              </a>
            </div>
        </div> --}}
        <li class="nav-item px-3">
          <a class="nav-link" href="/transform/create">Results</a>
        </li>
      </ul>
    <ul class="nav navbar-nav ml-auto mr-3">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img class="img-avatar mx-1" src="{{Auth::user()->avatar_url}}">
                <i class="nav-icon icon-logout"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow mt-2">
                <a class="dropdown-item">
                    {{ Auth::user()->name }}<br>
                    <small class="text-muted">{{ Auth::user()->email }}</small>
                </a>
                <a class="dropdown-item" href="/profile">
                    <i class="fa fa-user"></i> Profile
                </a>
                <div class="divider"></div>
                <a class="dropdown-item" href="/password">
                    <i class="fa fa-key"></i> Password
                </a>
                <div class="divider"></div>
                <a class="dropdown-item" href="{{ URL('/auth/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ URL('/auth/logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</header>