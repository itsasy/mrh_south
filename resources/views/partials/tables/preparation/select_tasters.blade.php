<div class="form-group col-12">
    <label for="catadores_selected">Seleccionar catadores</label>
    <div class="input-container">
        <select class="ui fluid search dropdown" multiple="" name="catadores_selected[]" id="catadores_selected"
            required="required">
            <option value="" disabled="disabled">Catadores expertos</option>

            @foreach ($tasters as $taster)
            <option value="{{$taster->id_usuario}}">{{$taster->nombres . ' ' .$taster->apellidos}}</option>
            
            @endforeach
        </select>
    </div>
</div>