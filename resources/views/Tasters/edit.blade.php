@extends('_layouts.admi')

@section('title', "Edición de catador")

@section('content')

<div class="mt-3 justify-content-center" id="">
    <form class="{{route('taster.update', ['taster' => $taster->id_usuario])}}" action="" method="post">
        @method('PUT')
        @csrf
        @include('partials.forms.create_or_edit.tasters')

        @include('partials.buttons.cancel_or_accept')
    </form>
</div>
@endsection

@section('scripts')

@endsection
