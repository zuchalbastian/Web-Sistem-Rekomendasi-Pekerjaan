<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="{{ URL('/home') }}">
                    <i class="nav-icon icon-speedometer"></i> Dashboard
                </a>
            </li>
            <li class="nav-title">Settings</li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="nav-icon icon-user"></i> Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="nav-icon icon-lock"></i> Roles
                </a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ URL('/biodata') }}">
                    <i class="nav-icon icon-badge"></i> Biodata
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ URL('/pendidikan') }}">
                    <i class="nav-icon icon-graduation"></i> Pendidikan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ URL('/skill') }}">
                    <i class="nav-icon icon-puzzle"></i> Kemampuan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ URL('/pengalaman') }}">
                    <i class="nav-icon icon-briefcase"></i> Pengalaman
                </a>
            </li>
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>