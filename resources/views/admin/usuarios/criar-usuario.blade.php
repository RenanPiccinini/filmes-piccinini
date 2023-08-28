@extends('layouts.admin')

@section('content')

<div class="container">
    <h3>Criar Usuário</h3>

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

    <form action="{{ route('criar-usuario-admin-post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col">
            <input type="text" class="form-control" name="name" placeholder="Nome" value="{{ old('name') }}">
          </div>
          <div class="col">
            <input type="email" class="form-control" name="email" placeholder="E-mail" value="{{ old('email') }}">
          </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone com DDD" value="{{ old('telefone') }}">
            </div>
            <div class="col">
                <input type="file" name="foto">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <input type="password" class="form-control" name="password" placeholder="Senha">
            </div>
            <div class="col">
                <input class="form-control" placeholder="Confirmar Senha" type="password" name="password_confirmation">
            </div>
        </div>

        <button class="btn btn-success mt-4">Cadastrar</button>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var telefoneInput = document.getElementById('telefone');

        telefoneInput.addEventListener('input', function(event) {
            var value = event.target.value;
            value = value.replace(/\D/g, '');
            var formattedValue = '';

            if (value.length > 0) {
                formattedValue += '(' + value.substring(0, 2) + ')';
            }
            if (value.length > 2) {
                formattedValue += value.substring(2, 7) + '-';
            }
            if (value.length > 7) {
                formattedValue += value.substring(7, 11);
            }

            event.target.value = formattedValue;
        });
    });
</script>




