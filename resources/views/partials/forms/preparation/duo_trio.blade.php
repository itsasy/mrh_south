<div class="col-12">
    <div class="form-inline justify-content-between mb-3">
        <div class="form-group col-4">
            <label class="justify-content-start col-9" for="level_signification">Nivel de significación</label>
            <input type="number" name="level_signification" id="level_signification" class="form-control col-3" min="0">
        </div>


        @include('partials.calendary.start_and_end')

       
        <div class="form-group col-6 mt-3">
            <label class="justify-content-start col-6" for="number_of_repeats"> Número de repeticiones</label>
            <input type="number" name="number_of_repeats" id="number_of_repeats" class="form-control col-6" min="0">
        </div>

        <div class="form-group col-6 mt-3">
            <label class="justify-content-start col-6" for="number of trials">Número de ensayos</label>
            <input type="number" name="number of trials" id="number of trials" class="form-control col-6" min="0">

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