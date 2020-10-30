@extends('_layouts.admi')

@section('title')
Preparación de Prueba {{$type == 'Duo-Trio' ? 'Dúo - Trío' : $type}}
@endsection

@section('content')
<div class="mt-3 justify-content-center" id="">
    <form action="{{route('preparation.store')}}" method="POST">
        @csrf
        @includeWhen($type == 'QDA', 'partials.forms.preparation.qda')
        @includeWhen($type == 'Duo-Trio', 'partials.forms.preparation.duo_trio')
        @includeWhen($type == 'Perfil de consumidores', 'partials.forms.preparation.perfil_de_consumidores')

        <input type="hidden" name="id_tipo_prueba" value="{{$id_type_sample}}">
        <input type="hidden" name="id_muestra" value="{{$id_muestra}}">

        
        @include('partials.buttons.cancel_or_accept')
    </form>
</div>
@endsection