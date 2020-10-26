<div class="col-12">
    <div class="form-inline justify-content-between mb-3">
        <div class="form-group col-4">
            <label class="justify-content-start col-9" for="number_of_atributes">Número de significación</label>
            <input type="number" name="number_of_atributes" id="number_of_atributes" class="form-control col-3" min="0">
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
            <label class="justify-content-start col-9" for="nombre_atributo">Número de ensayos</label>
            <input type="number" name="nombre_atributo" id="nombre_atributo" class="form-control col-3" min="0">
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
