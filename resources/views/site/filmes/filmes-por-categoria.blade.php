@extends('layouts.site')

@section('content')

<div class="container">

    @if(session('message'))
        <div class="alert alert-success col-md-6" id="alert" role="alert">
            {{ session('message') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger rounded-6" id="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
        </div>
    @endif

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @if(count($filmes) > 0)
            @foreach ($filmes as $filme)
                @if($filme->categoria_filme > 0)
                    <div class="col mt-5">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="{{ $filme->link_filme }}" allowfullscreen></iframe>
                                </div>
                                <h5 class="card-title text-center">{{ $filme->nome_filme }}</h5>
                                <p class="card-text text-center">{{ $filme->descricao_filme }}</p>
                                <a href="{{ $filme->link_filme }}" class="btn btn-primary" target="_blank">Assistir</a>
                            </div>
                            <div class="d-flex justify-content-between ">
                                <form action="{{ route('like-filme', ['filme' => $filme->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">👍 Like
                                        @if($filme->like_filme == null)
                                            (0)
                                        @else
                                            ({{ $filme->like_filme }})
                                        @endif
                                    </button>
                                </form>

                                <form action="{{ route('dislike-filme', ['filme' => $filme->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">👎 Dislike
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
                @endif
            @endforeach
        @else
            <div class="col-md-12 mt-5 text-center">
                <img src="{{ asset('assets/site/images/nenhum_video.png') }}" width="350px" alt="">
                <h1>Nenhum vídeo foi cadastrado para essa categoria</h1>
            </div>
        @endif
    </div>
</div>

<div class="d-flex justify-content-center mt-5">
    @if(count($filmes) > 6)
        {{ $filmes->links('pagination.bootstrap') }}
    @endif
</div>

@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    setTimeout(function() {
        var alertElement = document.getElementById('alert');
        if (alertElement) {
            alertElement.remove();
        }
    }, 4000);
</script>
