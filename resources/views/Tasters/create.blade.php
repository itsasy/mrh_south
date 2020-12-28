@extends('_layouts.prueba') 
@section('title', "Creación de juez")
@section('content')
<div class="justify-content-center" id="">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                @include('partials.alerts.error')
                <form action="{{route('taster.store')}}" method="POST">
                    @csrf @include('partials.forms.create_or_edit.tasters')

                    <div class="row justify-content-between pr-5 pl-5">
                        <a name="" id="" class="boton_cancelar text-uppercase col-5" href="{{route('manageTaster')}}" role="button">Cancelar</a>
                        <button type="submit" name="" id="" class="btn_aceptar text-uppercase col-5">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts') @endsection