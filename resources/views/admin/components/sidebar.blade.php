<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <div class="user-profile">
            <div class="profile-img">
                <img src="{{ asset('storage/perfil-usuarios/' . Auth::user()->foto) }}" alt="user" />
            </div>
            <div class="profile-text">
                <h5>{{ Auth::user()->name }}</h5>
                <form id="logout-form" action="{{ route('admin-logout') }}" method="POST">
                    @csrf
                    <button type="submit" data-toggle="tooltip" title="Logout" class="btn"><i class="mdi mdi-power"></i> </button>
                </form>
            </div>
        </div>
        <nav class="sidebar-nav">
            <ul>
                <li class="nav-devider"></li>
                <li>
                    <a href="#" data-toggle="collapse"  class="nav-link dropdown-toggle" data-target="#usuariosMenu">
                        <i class="mdi mdi-account"></i>
                        <span>Usuários</span>
                    </a>
                    <ul id="usuariosMenu" class="collapse">
                        <li><a href="{{ route('usuarios-admin') }}"><span>Ver usuários</span></a></li>
                        <li><a href="{{ route('criar-usuario-admin') }}"><span>Cadastrar Usuário</span></a></li>
                    </ul>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="#" data-toggle="collapse" class="nav-link dropdown-toggle" data-target="#filmesMenu">
                        <i class="mdi mdi-chart-bubble"></i>
                        <span>Filmes por categoria</span>
                    </a>
                    <ul id="filmesMenu" class="collapse">
                        @foreach ($categorias as $categoria)
                            <li>
                                <a href="{{ route('filmes-listar-por-categoria', ['categoria' => $categoria->nome_categoria]) }}" class="header__sub--menu__link">{{ $categoria->nome_categoria }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>

            <ul>
                <li>
                    <a href="{{ route('criar-filme-admin') }}">
                        <i class="mdi mdi-chart-bubble"></i>
                        <span>Adicionar filme</span>
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="{{ route('categorias-admin') }}">
                        <i class="mdi mdi-chart-bubble"></i>
                        <span>Categorias de filmes</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
