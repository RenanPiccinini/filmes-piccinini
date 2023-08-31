<div class="hero-section section position-relative">
    <div class="hero-item hero-item-4 hero-item-5 carousel slide" style="background-image: url({{ asset('assets/site/images/filmes2.jpg') }})" id="filmeCarousel" data-bs-ride="carousel">
        <div class="carousel-inner">
            <h1 class="text-center mb-4" style="color: #fff">Adicionados recentemente</h1>
            @foreach($filmes as $index => $filme)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="single-hero-item-slider-area">
                                    <div class=" clearfix">
                                        <div>
                                            <div class="single-game game-slide-item">
                                                <div class="game-img">
                                                    <iframe width="100%" height="500px" src="{{ $filme->link_filme }}" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                <div class="game-content">
                                                    <h4><a href="#">{{ $filme->nome_filme }}</a></h4>
                                                    <span>{{ $filme->categoria_filme }}</span>
                                                </div>
                                                <div class="d-flex ml-2">
                                                    <form action="{{ route('like-filme', ['filme' => $filme->id]) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success m-2">👍 Like
                                                            @if($filme->like_filme == null)
                                                                (0)
                                                            @else
                                                                ({{ $filme->like_filme }})
                                                            @endif
                                                        </button>
                                                    </form>

                                                    <form action="{{ route('dislike-filme', ['filme' => $filme->id]) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger m-2">👎 Dislike
                                                            @if($filme->dislike_filme == null)
                                                                (0)
                                                            @else
                                                                ({{ $filme->dislike_filme }})
                                                            @endif
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#filmeCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#filmeCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
