<div class="form-group col-12 mb-3">
    <label class="col-8 justify-content-start" for="study_parameter">Número de
        parámetros de estudio</label>
    <input type="number" name="study_parameter" id="study_parameter" class="form-control col-4" min="0" value="{{$test->nro_parametros_estudio ?? ''}}" required>
</div>

<div class="inputs_container col-12 mb-3 row">
    
</div>

@section('scripts')
<script src="{{asset('js/actions/generate_inputs.js')}}"></script>
@endsection
