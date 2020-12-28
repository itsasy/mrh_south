@extends('_layouts.taster')


@section('title', "Resultados de Pruebas")

@section('content')
<div class="justify-content-center" id="">
    @include('partials.alerts.success')
    @include('partials.alerts.error')
    @include('partials.tables.list.results')
</div>
@endsection

@section('scripts')

@endsection
