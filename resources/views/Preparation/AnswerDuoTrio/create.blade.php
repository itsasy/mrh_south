@extends('_layouts.prueba')

@section('title')
    Respuestas de la prueba Dúo Trío
@endsection

@section('content')
<div class="justify-content-center" id="">
       <div class="row">
        <div class="col-md-12">
            <div class="card p-5">
    @include('partials.tables.preparation.answers_dio_trio')
  
</div></div></div>
</div>
@endsection

