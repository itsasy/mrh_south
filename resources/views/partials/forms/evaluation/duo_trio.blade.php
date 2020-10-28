<div id="stepper" class="bs-stepper">
    {{-- header --}}
    <div class="bs-stepper-header" role="tablist">
        @foreach(range(1,10) as $key => $evaluation)
        {{-- POR AHORA SON ATRIBUTOS ESTÁTICOS QUE TOCAN CAMBIAR EN ESTA VISTA --}}
        <div class="step" data-target="#tab_{{$key}}">
            <button type="button" class="step-trigger" role="tab" id="steppertrigger{{$key}}"
                aria-controls="tab_{{$key}}">
                <span class="bs-stepper-circle">
                    <span class="fas fa-user" aria-hidden="true"></span>
                </span>
                <span class="bs-stepper-label">{{$key}}</span>
            </button>
        </div>
        {{--  --}}
        @endforeach
        {{-- REEMPLAZAR tab_10 por algún otro entero mayor al $key --}}
        <div class="step" data-target="#tab_10">
            <button type="button" class="step-trigger" role="tab" id="steppertrigger10" aria-controls="tab_10">
                <span class="bs-stepper-circle">
                    <span class="fas fa-save" aria-hidden="true"></span>
                </span>
                <span class="bs-stepper-label">Submit</span>
            </button>
        </div>
    </div>
    {{-- CONTENT --}}
    <div class="bs-stepper-content">
        <form action="#" class="needs-validation" novalidate>
            @foreach(range(1,10) as $key => $evaluacion)
            <div id="tab_{{$key}}" role="tabpanel" class="bs-stepper-pane fade"
                aria-labelledby="steppertrigger{{$key}}">

                
                <div class="row">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>Muestra</th>
                                    <th>Alternativa 1</th>
                                    <th>Alternativa 2</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td scope="row">1</td>
                                    <td>856</td>
                                    <td>290</td>
                                </tr>
                                <tr class="text-center">
                                    <td scope="row">2</td>
                                    <td>426</td>
                                    <td>118</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group col-12">
                            <label for="comentary">Comentario</label>
                            <textarea class="form-control" name="comentary" id="comentary" rows="3"></textarea>
                        </div>
                </div>


                <div class="row justify-content-between">
                    @if($key > 0)
                    <button type="button" class="btn btn-primary" onclick="stepper.previous()">Atrás</button>
                    @endif
                    <button type="button" class="btn btn-primary btn-next-form"
                        onclick="stepper.next()">Siguiente</button>
                </div>
            </div>
            @endforeach

            {{-- REEMPLAZAR tab_10 por algún otro entero mayor al $key --}}
            <div id="tab_10" role="tabpanel" class="bs-stepper-pane fade text-center"
                aria-labelledby="steppertrigger10">

                {{-- Agregar algún mensaje --}}
                <button type="submit" class="btn btn-primary mt-5">Enviar</button>
            </div>
        </form>
    </div>
</div>

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
<script>
    var stepperFormEl = document.querySelector('#stepper')
    var stepper = new Stepper(document.querySelector('#stepper'), {
        linear: false,
        animation: true
    })
</script>
@endsection