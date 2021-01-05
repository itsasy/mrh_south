<div class="col-12">
    <div class="form-inline justify-content-between mb-3">
        @include('partials.calendary.start_and_end')

        <div class="form-group col-6 mt-3">
            <label class="justify-content-start col-6" for="level_signification">Nivel de significación:</label>
            <select class="form-control col-6" name="level_signification" id="level_signification" required="required">
                <option selected disabled>Seleccionar</option>
                <option value="0.05">0.05</option>
                <option value="0.01">0.01</option>
            </select>
        </div>

        <div class="form-group col-6 mt-3">
            <label class="justify-content-start col-6" for="number_of_repeats"> Número de repeticiones:</label>
            <input type="number" name="number_of_repeats" id="number_of_repeats" class="form-control col-6" min="0" required>
        </div>

        <div class="form-group col-6 mt-3">
            <label class="justify-content-start col-6" for="number of trials">Número de ensayos:</label>
            <input type="number" name="number of trials" id="number of trials" class="form-control col-6" min="0" required>
        </div>

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
<script>
    $('form').form({
        inline: true,
        on: 'change',
        fields: {
            catadores_selected: {
                identifier: 'catadores_selected',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'La selección es obligatoria',
                    }
                ]
            }
        }
    });
</script>
@endsection