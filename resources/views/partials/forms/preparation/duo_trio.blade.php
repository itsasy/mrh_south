<div class="col-12">
    <div class="form-inline justify-content-between mb-3">
        <div class="form-group col-4">
            <label class="justify-content-start col-9" for="level_signification">Número de significación</label>
            <input type="number" name="level_signification" id="level_signification" class="form-control col-3" min="0">
        </div>

        @include('partials.calendary.start_and_end')
    </div>

    {{-- dudo si dejarlo aquí --}}
    <div class="form-inline mb-3">
        <div class="form-group col-4">
            <label class="justify-content-start col-9" for="number_of_repeats"> Número de repeticiones</label>
            <input type="number" name="number_of_repeats" id="number_of_repeats" class="form-control col-3" min="0">
        </div>
        <div class="form-group col-4">
            <label class="justify-content-start col-9" for="number_of_trials">Número de ensayos</label>
            <input type="number" name="number_of_trials" id="number_of_trials" class="form-control col-3" min="0">
        </div>
    </div>

    <div class="form-inline justify-content-between mb-3">
        <div class="form-group col-4">
            <label class="justify-content-start col-9" for="nro_jueces">Número de jueces</label>
            <input type="number" name="nro_jueces" id="nro_jueces" class="form-control col-3" min="0">
        </div>
    </div>
    @include('partials.tables.preparation.select_tasters')

</div>
