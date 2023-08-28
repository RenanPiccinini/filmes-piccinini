<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">
                <b>
                    <img src="{{ asset('assets/admin/images/filmes_logo.png')}}" style="width: 130px" alt="Logo" class="dark-logo" />
                    <img src="{{ asset('assets/admin/images/filmes_logo.png')}}" style="width: 130px" alt="Logo" class="light-logo" />
                </b>
                <span></span>
            </a>
        </div>

        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto mt-md-0">
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
            </ul>
            <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('storage/perfil-usuarios/' . Auth::user()->foto) }}" alt="user" class="profile-pic" /></a>
                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="{{ asset('storage/perfil-usuarios/' . Auth::user()->foto) }}" alt="user"></div>
                                    <div class="u-text">
                                        <h4>{{ Auth::user()->name }}</h4>
                                        <p class="text-muted">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>

                            <li>
                                <form id="logout-form" action="{{ route('admin-logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-link"><i class="fa fa-power-off"></i> Logout</button>
                                </form>
                            </li>

                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
