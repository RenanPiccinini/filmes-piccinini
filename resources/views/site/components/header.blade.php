<header class="header header-static bg-black header-sticky">
    <div class="default-header menu-right">
        <div class="container container-1520">
            <div class="row">

                <div class="col-12 col-md-3 col-lg-3 order-md-1 order-lg-1 mt-20 mb-20">
                    <div class="logo">
                        <a href="{{ route('home-site') }}"><img src="{{ asset('assets/site/images/icon.png') }}" width="110px" height="75px"  alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-12 order-md-3 order-lg-2 d-flex justify-content-center">
                    <nav class="main-menu menu-style-2">
                        <ul>
                            <li><a href="{{ route('home-site') }}">Home</a>
                            </li>
                            <li><a href="#">Vídeos</a>
                                <ul class="sub-menu">
                                    @foreach ($categorias as $categoria)
                                        <li>
                                            <a href="{{ route('site-filmes-listar-por-categoria', ['categoria' => $categoria->nome_categoria]) }}">
                                                {{ $categoria->nome_categoria }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{ route('contato-site') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-12 col-md-9 order-md-2 order-lg-3 col-lg-3">
                    <div class="header-right-wrap">
                        <ul>
                            <li><a href="{{ route('login') }}">LOGIN ADMIN</a></li>
                            <li><a href="{{ route('register') }}">REGISTER ADMIN</a></li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-12 d-flex d-lg-none">
                    <div class="mobile-menu"></div>
                </div>
            </div>
        </div>
    </div>
</header>
