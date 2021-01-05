@extends('_layouts.prueba')

@section('title')
Preparación de Prueba {{$type == 'Duo-Trio' ? 'Dúo - Trío' : $type}}
@endsection

@section('content')
<div class="justify-content-center" id="">
       <div class="row">
        <div class="col-md-12">
            <div class="card p-5">
    <form action="{{route('preparation.store')}}" method="POST" class="needs-validation" novalidate>
        @csrf
        @includeWhen($type == 'QDA', 'partials.forms.preparation.qda')
        @includeWhen($type == 'Duo-Trio', 'partials.forms.preparation.duo_trio')
        @includeWhen($type == 'Perfil de consumidores', 'partials.forms.preparation.perfil_de_consumidores')

        <input type="hidden" name="id_tipo_prueba" value="{{$id_type_sample}}">
        <input type="hidden" name="id_muestra" value="{{$id_muestra}}">
        <input type="hidden" name="orthogonal_code" value="{{$orthogonal_code}}">



        <div class="row justify-content-between pr-5 pl-5">
            <a name="" id="" class="boton_cancelar text-uppercase col-5" href="{{route('preparation.index')}}"   role="button">Cancelar</a>
            <button type="submit" name="" id="" class="btn_aceptar text-uppercase col-5">Aceptar</button>
        </div>

    </form>
    </div>
    </div>
    </div>
</div>
@endsection