<div class="form-inline">
    <div class="form-group col-12">
        <label class="col-8 justify-content-start" for="sample_name">Nombre de muestra:
            </label>
        <input type="text" name="sample_name" id="sample_name" class="form-control col-4"  value="{{$test->nombre_muestra ?? ''}}" required>
    </div>
    <div class="form-group col-12">
        <label class="col-8 justify-content-start" for="variety">Variedad:
            </label>
        <input type="text" name="variety" id="variety" class="form-control col-4" value="{{$test->variedad ?? ''}}" required>
    </div>
     <div class="form-group col-12">
        <label class="col-8 justify-content-start" for="origin">Procedencia:
            </label>
        <input type="text" name="origin" id="origin" class="form-control col-4"   value="{{$test->procedencia ?? ''}}" required>
    </div>
     <div class="form-group col-12">
        <label class="col-8 justify-content-start" for="humidity">Humedad:
            </label>
        <input type="text" name="humidity" id="humidity" class="form-control col-4"  value="{{$test->humedad ?? ''}}" required>
    </div>
     <div class="form-group col-12">
        <label class="col-8 justify-content-start" for="grain_size">Tamaño de grano:
            </label>
        <input type="text" name="grain_size" id="grain_size" class="form-control col-4" value="{{$test->tamanio_grano ?? ''}}" required>
    </div>
     <div class="form-group col-12">
        <label class="col-8 justify-content-start" for="responsable">Responsable:
            </label>
        <input type="text" name="responsable" id="responsable" class="form-control col-4"  value="{{$test->responsable ?? ''}}" required>
    </div>
    
    {{-- @includeWhen(request()->route()->getName() == 'test.create', 'partials.generate_inputs.number_of_study') --}}
    @include('partials.generate_inputs.number_of_study')

    <div class="form-group col-12">
        <label class="col-10 justify-content-start" for="number_of_models">Número de modelos ortogonales:</label>
        <input type="number" name="number_of_models" id="number_of_models" class="form-control col-2" min="0"  value="{{$test->nro_modelos_ortogonales ?? ''}}" required>
    </div>

    <div class="form-group col-12">
        <label class="col-10 justify-content-start" for="number_of_repeats">Número de
            repeticiones:</label>
        <input type="number" name="number_of_repeats" id="number_of_repeats" class="form-control col-2" min="0" value="{{$test->nro_repeticiones ?? ''}}"
            required>
    </div>

    {{-- @includeWhen(request()->route()->getName() == 'test.create', 'partials.checkLabels.checks_of_create_Test') --}}

    @include('partials.checkLabels.checks_of_create_Test')
</div>
