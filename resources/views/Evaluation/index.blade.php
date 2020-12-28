@extends('_layouts.taster')

@section('title', "Evaluación de Pruebas")

@section('content')
<div class="justify-content-center" id="">
       <div class="row">
        <div class="col-md-12">
            <div class="card p-5">
    @include('partials.alerts.success')
    @include('partials.alerts.error')
    @include('partials.tables.list.evaluation')
</div></div>
     </div>
        </div>
@endsection

@section('scripts')

@endsection
