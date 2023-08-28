@extends('layouts.admin')

@section('content')

<div class="container">
    <h3>Lista de Usuários</h3>

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
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Telefone</th>
                <th scope="col">Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->telefone }}</td>
                    <td>
                        <a href="{{ env('APP_URL') }}/storage/perfil-usuarios/{{ $usuario->foto }}" target="_blank">
                            <img src="{{ env('APP_URL') }}/storage/perfil-usuarios/{{ $usuario->foto }}" alt="" class="rounded-circle" width="50px">
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        @if(count($usuarios) > 0)
            {{ $usuarios->links('pagination.bootstrap') }}
        @endif
    </div>


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
