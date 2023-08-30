@extends('layouts.admin')

@section('content')

<div class="container">
    <h3>Editar Filme Youtube</h3>

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

    @if($errors->any())
        <div class="alert alert-danger rounded-3" id="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
        </div>
    @endif


    <form action="{{ route('editar-filme-admin-post', $filme->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $filme->id }}">

        <div class="row">
          <div class="col">
            <input type="text" class="form-control" name="nome_filme" placeholder="Nome do filme" value="{{ $filme->nome_filme }}">
          </div>
          <div class="col">
            <select class="form-control" name="categoria_filme">
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->nome_categoria }}" {{ $filme->categoria_filme == $categoria->nome_categoria ? 'selected' : '' }}>
                        {{ $categoria->nome_categoria }}
                    </option>
                @endforeach
            </select>
        </div>

        </div>
        <div class="row mt-4">
            <div class="col">
                <input type="text" class="form-control" id="ano_lancamento_filme" name="ano_lancamento_filme" placeholder="Ano lançamento" value="{{ $filme->ano_lancamento_filme }}">
            </div>
            <div class="col">
                <input type="text" class="form-control" name="descricao_filme" placeholder="Breve descrição" value="{{ $filme->descricao_filme }}">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <input type="text" class="form-control" id="link_filme" name="link_filme" placeholder="Link do youtube" value="{{ $filme->link_filme }}">
            </div>
        </div>

        <button class="btn btn-success mt-4">Salvar</button>
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
