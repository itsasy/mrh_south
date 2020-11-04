@extends('_layouts.taster')

@section('title')
Evaluación de Prueba {{$type == 'Duo-Trio' ? 'Dúo - Trío' : $type}}
@endsection

@section('content')
<div class="mt-3" id="">
    <div class="d-flex justify-content-center align-items-center container">
        @includeWhen($type == 'QDA', 'partials.forms.evaluation.qda')
        @includeWhen($type == 'Duo-Trio', 'partials.forms.evaluation.duo_trio')
        @includeWhen($type == 'Perfil de consumidores', 'partials.forms.evaluation.perfil_de_consumidores')
    </div>
</div>
@endsection