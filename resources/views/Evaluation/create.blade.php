@extends('_layouts.taster')

@section('title')
Evaluación de Prueba {{$type == 'Duo-Trio' ? 'Dúo - Trío' : $type}}
@endsection

@section('content')
<div class="justify-content-center" id="">
       <div class="row">
        <div class="col-md-12">
            <div class="card p-5">
        @includeWhen($type == 'QDA', 'partials.forms.evaluation.qda')
        @includeWhen($type == 'Duo-Trio', 'partials.forms.evaluation.duo_trio')
        @includeWhen($type == 'Perfil de consumidores', 'partials.forms.evaluation.perfil_de_consumidores')
    </div>
</div>
  </div>
</div>
@endsection