@extends('_layouts.admi')

@section('title', "Administrador")

@section('content')
<div class="mt-3 justify-content-center">
    @include('partials.modules.admi')
</div>

<div class="mt-3 col-12 text-center">
    @include('partials.buttons.logout')
</div>
@endsection