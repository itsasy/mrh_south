@extends('_layouts.taster')

@section('title', 'Catador')

@section('content')
<div class="mt-3 justify-content-center" id="">
    @include('partials.modules.taster')
</div>

<div class="mt-3 col-12 text-center">
    @include('partials.buttons.logout')
</div>
@endsection

