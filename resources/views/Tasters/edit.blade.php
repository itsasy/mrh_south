@extends('_layouts.admi')

@section('title', "Edición de catador")

@section('content')

<div class="mt-3 justify-content-center" id="">
    @include('partials.alerts.error')
    <form action="{{route('taster.update', ['taster' => $taster->id_usuario])}}" method="POST">
        @method('PUT')
        @csrf
        @include('partials.forms.create_or_edit.tasters')

        <div class="row justify-content-between">
            <a name="" id="" class="btn btn-primary" href="{{route('taster.index')}}" role="button">Cancelar</a>
            <button type="submit" name="" id="" class="btn btn-primary">Aceptar</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')

@endsection