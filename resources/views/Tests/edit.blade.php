@extends('_layouts.admi')

@section('title', "Editando Prueba")

@section('content')
<div class="mt-3 justify-content-center" id="">
    <form action="" method="post">
        @method('PUT')

        @include('partials.forms.create_or_edit.tests')

        @include('partials.buttons.cancel_or_accept')
    </form>
</div>
@endsection

@section('scripts')

@endsection
