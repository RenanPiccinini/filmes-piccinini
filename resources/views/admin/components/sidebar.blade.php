<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <div class="user-profile">
            <div class="profile-img">
                <img src="{{ asset('assets/admin/images/users/profile.png') }}" alt="user" />
            </div>
            <div class="profile-text">
                <h5>Nome user</h5>
                <a href="pages-login.html" class="" data-toggle="tooltip" title="Logout">
                    <i class="mdi mdi-power"></i>
                </a>
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
                        <li><a href="#"><span>Ver usuários</span></a></li>
                        <li><a href="#"><span>Cadastrar Usuário</span></a></li>
                    </ul>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="#" data-toggle="collapse"  class="nav-link dropdown-toggle" data-target="#filmesMenu">
                        <i class="mdi mdi-chart-bubble"></i>
                        <span>Filmes</span>
                    </a>
                    <ul id="filmesMenu" class="collapse">
                        <li><a href="#"><span>Ação</span></a></li>
                        <li><a href="#"><span>Aventura</span></a></li>
                        <li><a href="#"><span>Comédia</span></a></li>
                        <li><a href="#"><span>Romance</span></a></li>
                        <li><a href="#"><span>Terror</span></a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
