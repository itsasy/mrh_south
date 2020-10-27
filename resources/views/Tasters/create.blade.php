@extends('_layouts.admi')

@section('title', "Creación de catador")

@section('content')
<div class="mt-3 justify-content-center" id="">
    @include('partials.alerts.error')
    <form action="{{route('taster.store')}}" method="POST">
        @csrf
        @include('partials.forms.create_or_edit.tasters')

        @include('partials.buttons.cancel_or_accept')
    </form>
</div>
@endsection

@section('scripts')

@endsection