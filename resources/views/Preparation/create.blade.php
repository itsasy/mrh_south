@extends('_layouts.admi')

@section('title', "Preparación de Pruebas")

@section('content')
<div class="mt-3 justify-content-center" id="">
    {{-- @include('partials.forms.preparation.qda') --}}
    @include('partials.forms.preparation.duo_trio')
    {{-- @include('partials.forms.preparation.aceptabilidad') --}}
    @include('partials.buttons.cancel_or_accept')
</div>
@endsection