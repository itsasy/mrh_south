@extends('_layouts.admi')

@section('title', "Preparación de Pruebas " )

@section('content')
<div class="mt-3 justify-content-center" id="">
    
    @if($tipo_prueba == "QDA")
        @include('partials.forms.preparation.qda')
    @elseif($tipo_prueba == "Dúo - Trío")
        @include('partials.forms.preparation.duo_trio')
    @elseif($tipo_prueba == "Perfil de consumidores")
        @include('partials.forms.preparation.perfil_de_consumidores')
    @endif
        @include('partials.buttons.cancel_or_accept')
</div>
@endsection

@section('scripts')

@endsection
