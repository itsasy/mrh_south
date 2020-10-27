@extends('_layouts.taster')

@section('title')
Evaluación de Prueba {{$type == 'Duo-Trio' ? 'Dúo - Trío' : $type}}
@endsection

@section('content')
<div class="mt-3" id="">
    <form action="#" method="POST">
        <div class="d-flex justify-content-center align-items-center container">
            @csrf
            @includeWhen($type == 'QDA', 'partials.forms.evaluation.qda')
            @includeWhen($type == 'Duo-Trio', 'partials.forms.evaluation.duo_trio')
            @includeWhen($type == 'Aceptabilidad', 'partials.forms.evaluation.aceptabilidad')
        </div>

    <h1 class="text-center">FALTA IMPLEMENTAR LOS BOTONES</h1>

    </form>
</div>
@endsection