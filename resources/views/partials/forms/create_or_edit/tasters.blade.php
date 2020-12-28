<div class="row">
    <div class="form-group col-lg-6">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" name="name" id="name" value="{{$taster->nombres ?? ''}}" required>
    </div>
    <div class="form-group col-lg-6">
        <label for="lastname">Apellidos</label>
        <input type="text" class="form-control" name="lastname" id="lastname" value="{{$taster->apellidos ?? ''}}"
            required>
    </div>
    <div class="form-group col-lg-6">
        <label for="dni">DNI</label>
        <input type="number" class="form-control" name="dni" id="dni" value="{{$taster->nro_documento ?? ''}}" onKeyDown="if(this.value.length==8 && event.keyCode!=8) return false;"  required>
    </div>
    <div class="form-group col-lg-6">
        <label for="gender">Sexo</label>
        <select class="form-control" name="gender" id="gender">
            <option value="Masculino">Másculino</option>
            <option value="FEMEMINO">Fémenino</option>
        </select>
    </div>
    <div class="form-group col-lg-6">
        <label for="grade">Grado académico</label>
        <input type="text" class="form-control" name="grade" id="grade" value="{{$taster->grado ?? ''}}" required>
    </div>
  {{--  @if(request()->route()->getName() == 'taster.create')--}}
    <div class="form-group col-lg-6">
        <label for="email">Correo</label>
        <input type="email" class="form-control" name="email" id="email" value="{{$taster->correo ?? ''}}" required>
    </div>
    {{--@endif--}}
    <div class="form-group col-lg-6">
        <label for="cellphone">Celular</label>
        <input type="number" class="form-control" name="cellphone" id="cellphone" value="{{$taster->celular ?? ''}}" onKeyDown="if(this.value.length==9 && event.keyCode!=8) return false;" required>
    </div>
</div>