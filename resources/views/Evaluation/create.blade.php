@extends('_layouts.taster')

@section('title')
Evaluación de Prueba {{$type == 'Duo-Trio' ? 'Dúo - Trío' : $type}}
@endsection

@section('content')
<div class="mt-3 justify-content-center" id="">
    @includeWhen($type == 'QDA', 'partials.forms.evaluation.qda')
    @includeWhen($type == 'Duo-Trio', 'partials.forms.evaluation.duo_trio')
    @includeWhen($type == 'Aceptabilidad', 'partials.forms.evaluation.aceptabilidad')
    @include('partials.buttons.cancel_or_accept')
</div>
@endsection