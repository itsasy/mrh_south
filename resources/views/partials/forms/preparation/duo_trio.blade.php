<div class="col-12">
    <div class="form-inline justify-content-between mb-3">

        @include('partials.calendary.start_and_end')

        <div class="form-group col-6 mt-3">
            <label class="justify-content-start col-6" for="number_of_atributes">Número de significación</label>
            <input type="number" name="number_of_atributes" id="number_of_atributes" class="form-control col-6" min="0">
        </div>

        <div class="form-group col-6 mt-3">
            <label class="justify-content-start col-6" for="number_of_repeats"> Número de repeticiones</label>
        <input type="number" name="number_of_repeats" id="number_of_repeats" class="form-control col-6" value="{{$number_of_repeats}}" readonly>
        </div>

        <div class="form-group col-6 mt-3">
            <label class="justify-content-start col-6" for="name_of_atribute">Número de ensayos</label>
            <input type="number" name="name_of_atribute" id="name_of_atribute" class="form-control col-6" min="0">
        </div>
    </div>

    {{-- <div class="form-inline justify-content-between mb-3">
        <div class="form-group col-4">
            <label class="justify-content-start col-9" for="nro_jueces">Número de jueces</label>
            <input type="number" name="nro_jueces" id="nro_jueces" class="form-control col-3" min="0">
        </div>
    </div> --}}
    @include('partials.tables.preparation.select_tasters')

</div>

@section('style')
<link rel="stylesheet" href="{{asset('css/judge-picker/semantic.css')}}">
@endsection

@section('scripts')
<script src="{{asset('js/judge-picker/semantic.js')}}"></script>
<script src="{{asset('js/judge-picker/picker.js')}}"></script>
<script src="{{asset('js/actions/start_and_end_validator.js')}}"></script>
@endsection
