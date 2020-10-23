<div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" name="name" id="name" value="{{$taster->nombres ?? ' '}}" required>
</div>
<div class="form-group">
    <label for="lastname">Apellidos</label>
    <input type="text" class="form-control" name="lastname" id="lastname" value="{{$taster->apellidos ?? ' '}}">
</div>
<div class="form-group">
    <label for="dni">DNI</label>
    <input type="number" class="form-control" name="dni" id="dni" value="{{$taster->nro_documento ?? ' '}}">
</div>
<div class="form-group">
    <label for="grade">Grado</label>
    <input type="text" class="form-control" name="grade" id="grade" value="{{$taster->grado ?? ' '}}">
</div>
<div class="form-group">
    <label for="email">Correo</label>
    <input type="email" class="form-control" name="email" id="email" value="{{$taster->email ?? ' '}}">
</div>
<div class="form-group">
    <label for="cellphone">Celular</label>
    <input type="number" class="form-control" name="cellphone" id="cellphone" value="{{$taster->celular ?? ' '}}">
</div>
