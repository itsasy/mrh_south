@extends('layouts.app')

@section('title', "$type de Prueba")

@include('Test.components.header')

@section('content')
<div class="mt-3 justify-content-center" id="">
    @include('Test.components.' . $view)
</div>
@endsection

@section('scripts')

@endsection

@section('style')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

@endsection
