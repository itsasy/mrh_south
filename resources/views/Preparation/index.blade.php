@extends('_layouts.prueba')

@section('title', "Preparación de Pruebas")

@section('content')
<div class="justify-content-center" id="">
    @include('partials.alerts.success')
    @include('partials.alerts.error')
    @include('partials.alerts.warning')

    @include('partials.tables.list.preparation')
</div>
@endsection

@section('scripts')

@endsection
