@extends('_layouts.taster')

@section('title', "Evaluación de Pruebas")

@section('content')
<div class="mt-3 justify-content-center" id="">
    @include('partials.alerts.success')
    @include('partials.alerts.error')
    @include('partials.tables.list.evaluation')
</div>
@endsection

@section('scripts')

@endsection
