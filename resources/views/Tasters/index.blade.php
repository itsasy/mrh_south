@extends('_layouts.admi')

@section('title', "Lista de catadores")

@section('content')
<div class="mt-3 justify-content-center" id="">
    @include('partials.tables.list.tasters')
    @include('partials.modals.delete_confirm')
</div>
@endsection
