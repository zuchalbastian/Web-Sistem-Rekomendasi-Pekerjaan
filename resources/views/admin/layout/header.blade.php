<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{ url('/admin') }}">
        <img class="navbar-brand-full" src="{{ asset('logo/si-kom.png') }}" width="140" alt="Modulr Logo">
        <img class="navbar-brand-minimized" src="{{ asset('logo/si.png') }}" width="47" alt="Modulr Logo">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav navbar-nav d-md-down-none">
        <li class="nav-item px-3">
          <a class="nav-link" href="/admin">Dashboard</a>
        </li>
        <li class="nav-item px-3">
            <a class="nav-link" href="/admin/jobseeker">
                <i class="fa fa-database"></i>  Jobseeker
            </a>
        </li>
        {{-- <div class="dropdown">
            <button class="btn dropdown-toggle text-muted" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Jobseeker
            </button>
            <div class="dropdown-menu">
              <h6 class="dropdown-header">Dropdown Jobseeker</h6>
              <a class="dropdown-item" href="#">
                  <i class="fa fa-plus"></i> Create New Jobseeker
              </a>
              <a class="dropdown-item" href="/admin/jobseeker">
                <i class="fa fa-database"></i> Jobseeker
              </a>
            </div>
        </div> --}}
      </ul>
    <ul class="nav navbar-nav ml-auto mr-3">
        @guest('admin')
        <li><a class="nav-link" href="{{ route('admin.login') }}">{{ __('Admin Login') }}</a></li>
        @else
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
                <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endguest
            </div>
        </li>
    </ul>
</header>