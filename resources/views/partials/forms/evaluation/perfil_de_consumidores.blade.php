<div id="stepper" class="bs-stepper">
    {{-- header --}}
    <div class="bs-stepper-header justify-content-center" role="tablist">
        <div class="step" data-target="#tab_1">
            <button type="button" class="step-trigger" role="tab" id="steppertrigger1" aria-controls="tab_1">
                <span class="bs-stepper-circle">
                    <span class="fa fa-user" aria-hidden="true"></span>
                </span>
                <span class="bs-stepper-label">1</span>
            </button>
        </div>
        <div class="step" data-target="#tab_2">
            <button type="button" class="step-trigger" role="tab" id="steppertrigger2" aria-controls="tab_2">
                <span class="bs-stepper-circle">
                    <span class="fa fa-save" aria-hidden="true"></span>
                </span>
                <span class="bs-stepper-label">Submit</span>
            </button>
        </div>
    </div>
    {{-- CONTENT --}}
    <div class="bs-stepper-content">
        <form action="{{route('invited.registerPc')}}" method="POST" class="needs-validation" novalidate>
            @csrf
            <div id="tab_1" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="steppertrigger1">
                @foreach($valores_generales as $key => $atributos)
                <div class="row">
                    <div class="form-group col-12">
                        
                        <label for="{{$atributos->nombre_atributo}}">{{$atributos->nombre_atributo}}</label>
                        
                        <div class="row col-12 mt-2">
                            <div class="col-1" style="display: inline;"><p style="padding-right: 1rem;"> 0 </p></div>
                            <div class="col-10" >
                                <input type="range" class="form-control-range" id="{{$atributos->nombre_atributo}}" name="respuesta[{{$key}}]" value="0" max="10" step="0.1" require>
                            </div>
                            <div class="col-1" style="display: inline;"><p style="padding-left: 1rem;">  10 </p></div>
                        </div>
                        
                        <input type="text" id="{{$atributos->nombre_atributo}}" name="atributos[{{$key}}]" value="{{$atributos->id_detalle_atributos}}" hidden>
                        
                        <div class="invalid-feedback">Please fill the email field</div>
                    </div>
                </div>
                @endforeach

                <div class="row justify-content-between pr-5 pl-5">
                    <a name="" id="" class="boton_cancelar text-uppercase col-5" href="{{route('invited.index')}}" role="button">Cancelar</a>

                    <button type="button" class="btn_aceptar text-uppercase col-5 btn-next-form"
                        onclick="stepper.next()">Siguiente</button>
                </div>
                
                    
            </div>

            {{-- REEMPLAZAR tab_10 por algún otro entero mayor al $key --}}
            <div id="tab_2" role="tabpanel" class="bs-stepper-pane fade text-center" aria-labelledby="steppertrigger2">

                {{-- Agregar algún mensaje --}}
                <button type="submit" class="btn_aceptar text-uppercase  mt-5" style="display: inline;">Enviar</button>
            </div>

            <input type="hidden" name="id_eleccion" value="{{$id_eleccion}}">
            <input type="hidden" name="id_evaluacion" value="{{$id_evaluation}}">
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