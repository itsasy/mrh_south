<div class="form-group col-12">
    <label for="product_features">Caraterísticas del producto</label>
    <textarea class="form-control" name="product_features" id="product_features" rows="3">{{$test->caracteristica_producto ?? ' '}}</textarea>
</div>

<div class="form-inline">
    @include('partials.generate_inputs.number_of_study')

    <div class="form-group col-12">
        <label class="col-10 justify-content-start" for="number_of_models">Número de modelos
            ortogonales</label>
        <input type="number" name="number_of_models" id="number_of_models" class="form-control col-2" min="0"  value="{{$test->nro_modelos_ortogonales ?? ''}}" required>
    </div>

    <div class="form-group col-12">
        <label class="col-10 justify-content-start" for="number_of_repeats">Número de
            repeticiones</label>
        <input type="number" name="number_of_repeats" id="number_of_repeats" class="form-control col-2" min="0" value="{{$test->nro_repeticiones ?? ''}}"
            required>
    </div>

    @include('partials.checkLabels.checks_of_create_Test')
</div>