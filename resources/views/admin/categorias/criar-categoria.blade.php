@extends('layouts.admin')

@section('content')

<div class="container">
    <h3>Criar Categoria</h3>

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

    <form action="{{ route('criar-categoria-admin-post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col">
            <input type="text" class="form-control" name="nome_categoria" placeholder="Nome da categoria" value="{{ old('nome_categoria') }}">
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
