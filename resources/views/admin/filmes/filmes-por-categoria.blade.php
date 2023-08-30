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
                <th scope="col">Nome do filme Youtube</th>
                <th scope="col">Categoria</th>
                <th scope="col">Ano de lançamento</th>
                <th scope="col">Link</th>
                <th scope="col">Descrição</th>
                <th scope="col">Editar</th>
                <th scope="col">Deletar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($filmes as $filme)
                <tr>
                    <td>{{ $filme->nome_filme }}</td>
                    <td>{{ $filme->categoria_filme }}</td>
                    <td>{{ $filme->ano_lancamento_filme }}</td>
                    <td>
                        <a href="{{ $filme->link_filme }}" target="_blank">
                            {{ $filme->link_filme }}
                        </a>
                    </td>
                    <td>{{ $filme->descricao_filme }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('editar-filme-admin', $filme->id) }}">
                            Editar
                        </a>
                    </td>
                    <td>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $filme->id }}">
                            Excluir
                        </button>
                    </td>
                </tr>

                <!-- Modal de confirmação para exclusão -->
                <div class="modal fade" id="confirmDeleteModal{{ $filme->id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Exclusão</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                            </div>
                            <div class="modal-body">
                                Tem certeza que deseja excluir o filme/video "{{ $filme->nome_filme }}"?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <form action="{{ route('deletar-filme', $filme->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </tbody>
    </table>
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
