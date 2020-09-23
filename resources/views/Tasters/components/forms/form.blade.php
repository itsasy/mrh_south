<form class="" action="{{route($action)}}" method="post">
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" name="name" id="name">
    </div>
    <div class="form-group">
        <label for="lastname">Apellidos</label>
        <input type="text" class="form-control" name="lastname" id="lastname">
    </div>
    <div class="form-group">
        <label for="dni">DNI</label>
        <input type="number" class="form-control" name="dni" id="dni">
    </div>
    <div class="form-group">
        <label for="grade">Grado</label>
        <input type="text" class="form-control" name="grade" id="grade">
    </div>
    <div class="form-group">
        <label for="email">Correo</label>
        <input type="email" class="form-control" name="email" id="email">
    </div>
    <div class="form-group">
        <label for="cellphone">Celular</label>
        <input type="number" class="form-control" name="cellphone" id="cellphone">
    </div>
    @include('_layouts.cancel_or_accept')
</form>