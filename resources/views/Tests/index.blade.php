@extends('_layouts.admi')

@section('title', "Lista de Pruebas")

@section('content')
<div class="mt-3 justify-content-center" id="">
    @include('partials.alerts.success')
    @include('partials.alerts.error')
    @include('partials.tables.list.tests')
    @include('partials.modals.delete_confirm')
</div>
@endsection
