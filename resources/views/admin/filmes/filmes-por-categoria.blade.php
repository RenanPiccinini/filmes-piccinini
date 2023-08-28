@extends('layouts.admin')

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

    <table class="table">
        <thead class="table-primary">
            <tr>
                <th scope="col">Nome do filme</th>
                <th scope="col">Categoria</th>
                <th scope="col">Ano de lançamento</th>
                <th scope="col">Descrição</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($filmes as $filme)
                <tr>
                    <td>{{ $filme->nome_filme }}</td>
                    <td>{{ $filme->categoria_filme }}</td>
                    <td>{{ $filme->ano_lancamento_filme }}</td>
                    <td>{{ $filme->descricao_filme }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
