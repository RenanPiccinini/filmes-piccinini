@extends('layouts.site')

@section('content')

@include('site.components.slider-section')

<div class="container">
    <div class="row pt-100">
        <div class="col-lg-8">
            @include('site.components.blog')
        </div>
        <div class="col-lg-4">
            @include('site.components.sidebar')
        </div>
    </div>
</div>

@endsection
