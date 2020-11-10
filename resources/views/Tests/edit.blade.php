@extends('_layouts.admi')

@section('title', "Editando Prueba")

@section('content')
<div class="mt-3 justify-content-center" id="">
    @include('partials.alerts.error')
    <form action="{{route('test.update', ['test' => $test->id_muestra])}}" method="POST">
        @method('PUT')
        @csrf
        @include('partials.forms.create_or_edit.tests')

        <div class="row justify-content-between">
            <a name="" id="" class="btn btn-primary" href="{{route('manageTest')}}" role="button">Cancelar</a>
            <button type="submit" name="" id="" class="btn btn-primary">Aceptar</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')

@endsection