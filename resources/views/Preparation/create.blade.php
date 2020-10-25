@extends('_layouts.admi')

@section('title')
Preparación de Prueba {{$type == 'Duo-Trio' ? 'Dúo - Trío' : $type}}
@endsection

@section('content')
<div class="mt-3 justify-content-center" id="">
    @includeWhen($type == 'QDA', 'partials.forms.preparation.qda')
    @includeWhen($type == 'Duo-Trio', 'partials.forms.preparation.duo_trio')
    @includeWhen($type == 'Aceptabilidad', 'partials.forms.preparation.aceptabilidad')
    @include('partials.buttons.cancel_or_accept')
</div>
@endsection