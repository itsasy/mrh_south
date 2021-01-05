<div class="form-group col-12 mr-3 ml-3">
    <label for="catadores_selected">Seleccionar jueces (mínimo 6 jueces):</label>
    <div class="ui three sixteen wide field">
        <input type="hidden" name="camp" id="camp">
        <select class="ui fluid search dropdown center" multiple="" name="catadores_selected[]"
            id="catadores_selected" required="required">
            
            <option value="" disabled="disabled" selected>Jueces expertos</option>
            
            @foreach ($tasters as $taster)
                <option value="{{$taster->id_usuario}}">{{$taster->nombres . ' ' .$taster->apellidos}}</option>
            @endforeach
        </select>
    </div>
</div>