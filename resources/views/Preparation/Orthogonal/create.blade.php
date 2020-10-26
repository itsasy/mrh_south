@extends('_layouts.admi')

@section('title', "Preparación de Pruebas-Ortogonales")

@section('content')
<div class="mt-3 justify-content-center" id="">
    @include('partials.tables.preparation.sample_coding')
    @include('partials.buttons.cancel_or_accept')
</div>
@endsection

@section('scripts')

@endsection
