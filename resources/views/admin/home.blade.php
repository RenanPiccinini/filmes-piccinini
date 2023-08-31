@extends('layouts.admin')

@section('content')

<div class="container-fluid">

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

    <div class="row text-center">
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-12"><h2>{{ count($filmes) }} <i class="ti-angle-up font-14 text-success"></i></h2>
                            <h6>Filmes cadastrados</h6></div>
                        <div class="col-4 align-self-center text-right p-l-0">
                            <div id="sparklinedash"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-12"><h2 class="">{{ count($usuarios) }} <i class="ti-angle-up font-14 text-success"></i></h2>
                            <h6>Usuários cadastrados</h6></div>
                        <div class="col-4 align-self-center text-right p-l-0">
                            <div id="sparklinedash"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
