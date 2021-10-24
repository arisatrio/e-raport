<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark" >

        <div class="navbar-header">
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                <i class="ti-menu ti-close"></i>
            </a>
            <a class="navbar-brand" href="/">
                <b class="logo-icon">
                    <img src="{{ asset('apple-touch-icon.png') }}" alt="homepage" class="dark-logo d-xs-none d-xs-block" style="width: 51px; height: 51px;" />
                </b>

                <span class="logo-text">
                    <h5 style="color: black; float: left; margin-top:10px; margin-left:5px">E-RAPORT KANEZA</h5>
                </span>
            </a>
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="ti-more"></i>
            </a>
        </div>

        <div class="navbar-collapse collapse" id="navbarSupportedContent" style="background-color: #017cc2">
            <ul class="navbar-nav float-left mr-auto">
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                        <i class="mdi mdi-menu font-24"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link waves-effect waves-light" href="javascript:void(0)">
                        TA
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav float-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('assets/images/users/1.jpg') }}" alt="user" class="rounded-circle" width="31">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <span class="with-arrow">
                            <span class="bg-primary"></span>
                        </span>
                        <div class="d-flex no-block align-items-center p-15 text-white mb-2" style="background-color: #017cc2">
                            <div class="">
                                <img src="{{ asset('assets/images/users/1.jpg') }}" alt="user" class="img-circle" width="60">
                            </div>
                            <div class="ml-2">
                                <h4 class="mb-0">{{auth()->user()->name}}</h4>
                                <p class=" mb-0">{{auth()->user()->email}}</p>
                            </div>
                        </div>
                        <a class="dropdown-item" data-toggle="modal" data-target="#ubahPassword" href="javascript:;">
                            <i class="ti-settings mr-1 ml-1"></i> Ubah Password
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off mr-1 ml-1"></i>
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>