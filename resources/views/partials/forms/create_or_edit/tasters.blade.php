<div class="row">
    <div class="form-group col-lg-6">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" name="name" id="name" value="{{$taster->nombres ?? ' '}}" required>
    </div>
    <div class="form-group col-lg-6">
        <label for="lastname">Apellidos</label>
        <input type="text" class="form-control" name="lastname" id="lastname" value="{{$taster->apellidos ?? ' '}}">
    </div>
    <div class="form-group col-lg-6">
        <label for="type_document">Tipo de documento</label>
        <select class="form-control" name="type_document" id="type_document">
            <option value="1">Tipo 1</option>
            <option value="2">Tipo 2</option>
            <option value=3>Tipo 3</option>
        </select>
    </div>
    <div class="form-group col-lg-6">
        <label for="dni">DNI</label>
        <input type="number" class="form-control" name="dni" id="dni" value="{{$taster->nro_documento ?? ' '}}">
    </div>
    <div class="form-group col-lg-6">
        <label for="gender">Sexo</label>
        <select class="form-control" name="gender" id="gender">
            <option value="Masculino">Másculino</option>
            <option value="FEMEMINO">Fémenino</option>
        </select>
    </div>
    <div class="form-group col-lg-6">
        <label for="grade">Grado</label>
        <input type="text" class="form-control" name="grade" id="grade" value="{{$taster->grado ?? ' '}}">
    </div>
    <div class="form-group col-lg-6">
        <label for="email">Correo</label>
        <input type="email" class="form-control" name="email" id="email" value="{{$taster->email ?? ' '}}">
    </div>
    <div class="form-group col-lg-6">
        <label for="cellphone">Celular</label>
        <input type="number" class="form-control" name="cellphone" id="cellphone" value="{{$taster->celular ?? ' '}}">
    </div>
</div>