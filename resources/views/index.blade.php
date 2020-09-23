@extends('_layouts.app')

@section('title', "title de Prueba")

@include('_layouts.header')

@section('content')
<div class="mt-3 justify-content-center" id="">
    <div class="row justify-content-around">
        <div class="card">
            <div class="card-body text-center">
                <div>
                    <i class="fas fa-user fa-4x"></i>
                </div>
                <h4 class="card-title">Administración de Pruebas</h4>
            </div>
            <div class="card-footer text-center">
                <a name="#" id="" class="btn btn-primary" href="#" role="button">Ingresar</a>
            </div>
        </div>
        <div class="card text-center">
            <div class="card-img-top">
                <i class="fas fa-user fa-4x"></i>
            </div>
            <div class="card-body">
                <h4 class="card-title">Administración de Jurados</h4>
            </div>
            <div class="card-footer">
                <a name="#" id="" class="btn btn-primary" href="#" role="button">Ingresar</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection

@section('style')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
@endsection
