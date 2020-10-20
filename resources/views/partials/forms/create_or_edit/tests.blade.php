<div class="form-group col-12">
    <label for="product_features">Caraterísticas del producto</label>
    <textarea class="form-control" name="product_features" id="product_features" rows="3"></textarea>
</div>

<div class="form-inline">
    <div class="form-group col-12">
        <label class="col-10 justify-content-start" for="study_parameter">Número de
            parámetros de estudio</label>
        <input type="number" name="study_parameter" id="study_parameter" class="form-control col-2" min="0" required>
    </div>
    
    <div class="form-group col-12">
        <label class="col-10 justify-content-start" for="number_of_models">Número de modelos
            ortogonales</label>
        <input type="number" name="number_of_models" id="number_of_models" class="form-control col-2" min="0" required>
    </div>

    <div class="form-group col-12">
        <label class="col-10 justify-content-start" for="number_of_repeats">Número de
            repeticiones</label>
        <input type="number" name="number_of_repeats" id="number_of_repeats" class="form-control col-2" min="0" required>
    </div>

    @include('partials.checkLabels.checks_of_create_Test')
</div>
