@extends('_layouts.prueba')

@section('title', "Lista de catadores")

@section('content')
<div class="justify-content-center" id="">
    @include('partials.alerts.success')
    @include('partials.alerts.error')
    @include('partials.tables.list.tasters')
    @include('partials.modals.delete_confirm')
</div>
@endsection
