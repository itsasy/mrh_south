@extends('_layouts.admi')

@section('title', "Creación de prueba")

@section('content')
<div class="mt-3 justify-content-center" id="">
    <form  action="{{route('test.store')}}" method="POST" enctype="multipart/form-data" >
            {{ csrf_field() }}

        @include('partials.forms.create_or_edit.tests')

        @include('partials.buttons.cancel_or_accept')

    </form>
</div>
@endsection

@section('scripts')

@endsection
