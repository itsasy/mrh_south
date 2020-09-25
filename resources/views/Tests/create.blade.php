@extends('_layouts.admi')

@section('title', "Creando prueba")

@section('content')
<div class="mt-3 justify-content-center" id="">
    <form class="{{route('test.store')}}" action="" method="post">

        @include('partials.forms.create_or_edit.tests')

        @include('partials.buttons.cancel_or_accept')

    </form>
</div>
@endsection

@section('scripts')

@endsection
