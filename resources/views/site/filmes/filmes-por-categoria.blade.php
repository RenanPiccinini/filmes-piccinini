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
        @foreach ($filmes as $filme)
            <div class="col">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="{{ $filme->link_filme }}" allowfullscreen></iframe>
                        </div>
                        <h5 class="card-title text-center">{{ $filme->nome_filme }}</h5>
                        <p class="card-text text-center">{{ $filme->descricao_filme }}</p>
                        <a href="{{ $filme->link_filme }}" class="btn btn-primary" target="_blank">Assistir</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
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
