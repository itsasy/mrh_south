<div class="form-group col-12">
    <label class="col-10 justify-content-start" for="study_parameter">Número de
        parámetros de estudio</label>
    <input type="number" name="study_parameter" id="study_parameter" class="form-control col-2" min="0" value="{{$test->nro_parametros_estudio ?? ''}}" required>
</div>

<div class="inputs_container col-12">
    <div class="row">

    </div>
</div>

@section('scripts')
<script src="{{asset('js/actions/generate_inputs.js')}}"></script>
@endsection
