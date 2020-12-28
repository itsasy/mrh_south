@extends('_layouts.prueba')

@section('title', "Preparación de Pruebas Ortogonales")

@section('content')
<form action="{{route('orthogonal.store')}}" method="POST" class="mt-3 justify-content-center" id="">
    @csrf
    @include('partials.tables.preparation.sample_coding')
    
     <div class="row justify-content-between pr-5 pl-5">
            <a name="" id="" class="boton_cancelar text-uppercase col-5" href="{{route('preparation.index')}}"  role="button">Cancelar</a>
            <button type="submit" name="" id="" class="btn_aceptar text-uppercase col-5">Aceptar</button>
        </div>

</form>
@endsection