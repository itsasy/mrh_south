<div class="col-12">
    <div class="form-inline justify-content-between">

        @include('partials.calendary.start_and_end')
        
        <div class="form-group col-6 mt-3">
            <label class="justify-content-start col-6" for="number_of_atributes">Número de atributos</label>
            <input type="number" name="number_of_atributes" id="number_of_atributes" class="form-control col-6"
                value="" min=1 required>
        </div>
    </div>
    <!-- Autogenerado -->
    <div class="inputs_container form-inline justify-content-between mb-3">

    </div>
    @include('partials.tables.preparation.select_tasters')
</div>



@section('style')
<link rel="stylesheet" href="{{asset('css/judge-picker/semantic.css')}}">
@endsection

@section('scripts')
<script src="{{asset('js/judge-picker/semantic.js')}}"></script>
<script src="{{asset('js/judge-picker/picker.js')}}"></script>
<script src="{{asset('js/actions/start_and_end_validator.js')}}"></script>
<script src="{{asset('js/actions/generate_inputs_to_preparation.js')}}"></script>
<script>
    $('form').form({
        inline: true,
        on: 'change',
        fields: {
            catadores_selected: {
                identifier: 'catadores_selected',
                rules: [{
                    type: 'minCount[6]',
                    prompt: 'Seleccione 6 catadores como mínimo'
                }]
            }
        }
    });
</script>
@endsection