<div id="stepper" class="bs-stepper">
    {{-- header --}}
    <div class="bs-stepper-header justify-content-center" role="tablist">
        <div class="step" data-target="#tab_1">
            <button type="button" class="step-trigger" role="tab" id="steppertrigger1" aria-controls="tab_1">
                <span class="bs-stepper-circle">
                    <span class="fas fa-user" aria-hidden="true"></span>
                </span>
                <span class="bs-stepper-label">1</span>
            </button>
        </div>
        <div class="step" data-target="#tab_2">
            <button type="button" class="step-trigger" role="tab" id="steppertrigger2" aria-controls="tab_2">
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
            <div id="tab_1" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="steppertrigger1">
                @foreach($valores_generales as $key => $atributos)
                <div class="row">
                    <div class="form-group col-12">
                        <label for="{{$atributos->nombre_atributo}}">{{$atributos->nombre_atributo}}</label>
                        <input type="range" class="form-control-range" id="{{$atributos->nombre_atributo}}" name="respuesta" value="0" max="10"
                            require>
                        <div class="invalid-feedback">Please fill the email field</div>
                    </div>
                </div>
                @endforeach

                <div class="row justify-content-between">
                    <button type="button" class="btn btn-primary btn-next-form"
                        onclick="stepper.next()">Siguiente</button>
                </div>
            </div>

            {{-- REEMPLAZAR tab_10 por algún otro entero mayor al $key --}}
            <div id="tab_2" role="tabpanel" class="bs-stepper-pane fade text-center"
                aria-labelledby="steppertrigger2">

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