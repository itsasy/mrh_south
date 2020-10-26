@extends('_layouts.admi')

@section('title', "Editando Prueba")

@section('content')
<div class="mt-3 justify-content-center" id="">
    @include('partials.alerts.error')
    <form action="{{route('test.update', ['test' => $test->id_muestra])}}" method="POST">
        @method('PUT')
        @csrf
        @include('partials.forms.create_or_edit.tests')

        @include('partials.buttons.cancel_or_accept')
    </form>
</div>
@endsection

@section('scripts')

@endsection