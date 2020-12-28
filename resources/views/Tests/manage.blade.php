@extends('_layouts.prueba')

@section('title', "Gestión de pruebas")

@section('content')
<div class="justify-content-center" id="">
      
    @include('partials.alerts.success')
    @include('partials.alerts.error')
    @include('partials.manage.tests')

        </div>
@endsection

@section('scripts')

@endsection
