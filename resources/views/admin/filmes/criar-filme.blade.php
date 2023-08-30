@extends('layouts.admin')

@section('content')

<div class="container">
    <h3>Criar Filme Youtube</h3>

    @if(session('message'))
        <div class="alert alert-success col-md-6" id="alert" role="alert">
            {{ session('message') }}
        </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger col-md-6" id="alert" role="alert">
        {{ session('error') }}
    </div>
@endif

    <form action="{{ route('criar-filme-admin-post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col">
            <input type="text" class="form-control" name="nome_filme" placeholder="Nome do filme" value="{{ old('nome_filme') }}">
          </div>
          <div class="col">
            <select class="form-control" name="categoria_filme">
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->nome_categoria }}">{{ $categoria->nome_categoria }}</option>
                @endforeach
            </select>
          </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <input type="text" class="form-control" id="ano_lancamento_filme" name="ano_lancamento_filme" placeholder="Ano lançamento" value="{{ old('ano_lancamento_filme') }}">
            </div>
            <div class="col">
                <input type="text" class="form-control" name="descricao_filme" placeholder="Breve descrição" value="{{ old('descricao_filme') }}">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <input type="text" class="form-control" id="link_filme" name="link_filme" placeholder="Link do youtube" value="{{ old('link_filme') }}">
            </div>
        </div>

        <button class="btn btn-success mt-4">Criar</button>
    </form>
</div>

@endsection

<script>
    setTimeout(function() {
        var alertElement = document.getElementById('alert');
        if (alertElement) {
            alertElement.remove();
        }
    }, 4000);
</script>
