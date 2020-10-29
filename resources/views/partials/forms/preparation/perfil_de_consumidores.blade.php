<div class="col-12">
    <div class="form-inline justify-content-between">

        @include('partials.calendary.start_and_end')

        <div class="form-group col-6 mt-3">
            <label class="justify-content-start col-6" for="number_of_atributes">Número de atributos</label>
            <input type="number" name="number_of_atributes" id="number_of_atributes" class="form-control col-6" value="{{$number_of_attributes}}" readonly>
        </div>

    </div>

    {{-- dudo si dejarlo aquí --}}
    <!-- Autogenerado -->
    <div class="form-inline justify-content-between mb-3">
        @for ($i = 1; $i <= $number_of_attributes; $i++)
        <div class="form-group col-6 mt-3">
        <label class="justify-content-start col-6" for="nombre_atributo_{{$i}}"> Atributo {{$i}}</label>
        <input type="text" name="nombre_atributo[]" id="nombre_atributo_{{$i}}" class="form-control col-6" min="0">
        </div>    
        @endfor
    </div>

   {{--  <div class="form-inline justify-content-between mb-3">
        <div class="form-group col-4">
            <label class="justify-content-start col-9" for="nro_jueces"> Número de jueces</label>
            <input type="number" name="nro_jueces" id="nro_jueces" class="form-control col-3" min="0">
        </div>
    </div> --}}
</div>

@section('style')
<link rel="stylesheet" href="{{asset('css/judge-picker/semantic.css')}}">
@endsection

@section('scripts')
<script src="{{asset('js/actions/start_and_end_validator.js')}}"></script>
@endsection
