<div class="blog-area section pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-xs-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="single-blog-post mb-30">
                            @foreach ($todos_filmes as $filme)
                                <div class="blog-img">
                                    <iframe width="100%" height="400px" src="{{ $filme->link_filme }}" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="blog-content">
                                    <h3><a href="single-blog.html">{{ $filme->nome_filme }}</a></h3>
                                    <p>{{ $filme->descricao_filme }}</p>

                                    <div class="blog-bottom">
                                        <ul>
                                            <li>Cadastrado por</li>
                                            <li>{{ $filme->user->name }}</li>
                                        </ul>
                                    </div>
                                    <div class="blog-bottom">
                                        <ul class="meta meta-border-bottom m-0">
                                            <li>Lançado em</li>
                                            <li>{{ $filme->ano_lancamento_filme }}</li>
                                            <li>{{ $filme->categoria_filme }}</li>
                                        </ul>
                                        <a class="read-btn" href="{{ $filme->link_filme }}" target="_blank">Ver em outra aba <i class="fa fa-caret-right"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    @if(count($todos_filmes) > 3)
                        {{ $todos_filmes->links('pagination.bootstrap') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
