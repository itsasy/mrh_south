@extends('_layouts.admi')

@section('title', "Resultados de Pruebas")

@section('content')
<div class="mt-3 justify-content-center" id="">
    @include('partials.alerts.success')
    @include('partials.alerts.error')
    @include('partials.tables.list.results')
</div>
@endsection

@section('scripts')

@endsection
