@extends('_layouts.admi')

@section('title', "Preparación de Pruebas Ortogonales")

@section('content')
<form action="{{route('orthogonal.store')}}" method="POST" class="mt-3 justify-content-center" id="">
    @csrf
    @include('partials.tables.preparation.sample_coding')
    @include('partials.buttons.cancel_or_accept')
</form>
@endsection
