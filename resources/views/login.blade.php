@extends('_layouts.admi')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-9 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Inicia Sesión</h5>
            <form class="form-signin"  action="{{route('logeo')}}" method="POST" >
               {{csrf_field()}}
              <div class="form-label-group">
                <input type="text" id="username" name="username" class="form-control" placeholder="Usuario" required autofocus>
                <label for="username">Usuario</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
                <label for="password">Contraseña</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Recordar contraseña</label>
              </div>
              <button class="btn btn-lg btn-success btn-block text-uppercase" type="submit">Ingresar</button>
              <hr class="my-4">
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection