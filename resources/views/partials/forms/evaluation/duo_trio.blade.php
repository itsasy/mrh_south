<div id="stepper" class="bs-stepper">
    {{-- header --}}
    <div class="bs-stepper-header justify-content-center" role="tablist">

        @foreach($valores_generales['answer'] as $iterator => $repeat)
        {{-- @for($iterator = 0; $iterator < $repeats; $iterator++) --}}
        {{-- POR AHORA SON ATRIBUTOS ESTÁTICOS QUE TOCAN CAMBIAR EN ESTA VISTA --}}
        <div class="step" data-target="#tab_{{$iterator}}">
            <button type="button" class="step-trigger" role="tab" id="steppertrigger{{$iterator}}"
                aria-controls="tab_{{$iterator}}">
                <span class="bs-stepper-circle">
                    <span class="fa fa-user" aria-hidden="true"></span>
                </span>
                <span class="bs-stepper-label">{{$iterator}}</span>
            </button>
        </div>
        {{--  --}}
        @endforeach

        {{-- REEMPLAZAR tab_10 por algún otro entero mayor al $key --}}
        <div class="step" data-target="#tab_10">
            <button type="button" class="step-trigger" role="tab" id="steppertrigger10" aria-controls="tab_10">
                <span class="bs-stepper-circle">
                    <span class="fa fa-save" aria-hidden="true"></span>
                </span>
                <span class="bs-stepper-label">Submit</span>
            </button>
        </div>
    </div>
    {{-- CONTENT --}}
    <div class="bs-stepper-content">
        <form action="{{route('evaluation.store')}}" method="POST" class="needs-validation" novalidate>
            @csrf
            @foreach($valores_generales['answer'] as $key_repeat => $repeat)
            <div id="tab_{{$key_repeat}}" role="tabpanel" class="bs-stepper-pane fade"
                aria-labelledby="steppertrigger{{$key_repeat}}">
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
                            @foreach($repeat as $key_sample => $sample)
                            <tr class="text-center">
                                <td scope="row">{{$key_sample}}</td>
                                <td>
                                    <input type="radio" name="muestra_valor[{{$key_repeat}}][{{$key_sample}}]"
                                        id="alternative_one[{{$key_repeat}}][{{$key_sample}}]"
                                        value="{{$sample['alternativa_uno']}}">

                                    <label
                                        for="alternative_one[{{$key_repeat}}][{{$key_sample}}]">{{$sample['alternativa_uno']}}
                                    </label>
                                </td>
                                <td>
                                    <input type="radio" name="muestra_valor[{{$key_repeat}}][{{$key_sample}}]"
                                        id="alternative_two[{{$key_repeat}}][{{$key_sample}}]"
                                        value="{{$sample['alternativa_dos']}}">

                                    <label
                                        for="alternative_two[{{$key_repeat}}][{{$key_sample}}]">{{$sample['alternativa_dos']}}</label>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="form-group col-12">
                        <label for="comentary">Comentario</label>
                        <textarea class="form-control" name="comentary[{{$key_repeat}}]" id="comentary"
                            rows="3"></textarea>
                    </div>
                </div>



                <div class="row justify-content-between pr-5 pl-5">
                    @if($key_repeat == 1 )
                    <a name="" id="" class="boton_cancelar text-uppercase col-5" href="{{route('evaluation.index')}}" role="button">Cancelar</a>
                    @else
                    <button type="button" class="boton_cancelar text-uppercase col-5" onclick="stepper.previous()">Atrás</button>
                    @endif
                    <button type="button" class="btn_aceptar text-uppercase col-5 btn-next-form"
                        onclick="stepper.next()">Siguiente</button>
                </div>
            </div>
            @endforeach

            {{-- REEMPLAZAR tab_10 por algún otro entero mayor al $key --}}
            <div id="tab_10" role="tabpanel" class="bs-stepper-pane fade text-center"
                aria-labelledby="steppertrigger10">

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