@extends('_layouts.admi')

@section('title', "Preparación de Pruebas Ortogonales")

@section('content')
<form action="{{route('orthogonal.store')}}" method="POST" class="mt-3 justify-content-center" id="">
    @csrf
    @include('partials.tables.preparation.sample_coding')
    <div class="row justify-content-between">
        <a name="" id="" class="btn btn-primary" href="{{route('preparation.index')}}" role="button">Cancelar</a>
        <button type="submit" name="" id="" class="btn btn-primary">Aceptar</button>
    </div>
</form>
@endsection