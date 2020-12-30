@php
use App\Models\TestType;
$type = TestType::all();
@endphp

<table class="table table-striped table-inverse">
    <thead class="thead-inverse">
        <tr class="text-center">
            <th class="text-nowrap">Código</th>
            <th class="text-nowrap">Tipo</th>
            <th class="text-nowrap">Fecha de Inicio</th>
            <th class="text-nowrap">Fecha de Finalización</th>
            <th class="text-nowrap"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($evaluation as $sample)
        <tr class="text-center">
            <td scope="row">{{$sample->ChoiceTestSample->id_muestra}}-{{$sample->ChoiceTestSample->codigo_ortogonal}}</td>
            <td>{{$type[$sample->ChoiceTestSample->id_tipo_prueba-1]->tipo}}</td>
            <td>{{$sample->ChoiceTestSample->fecha_inicio}}</td>
            <td>{{$sample->ChoiceTestSample->fecha_fin}}</td>
            @if($sample->ChoiceTestSample->id_tipo_prueba == 1)
            <td>
                <a href="{{route('evaluation.create', [
                    'evaluation'=> $sample->id_evaluacion, 
                    'election' => $sample->id_eleccion_prueba_muestra,
                    'type' => 'Duo-Trio'])}}" class="btn boton" role="button" style="height:30px;padding-top: 10px;">
                    <i class="fa fa-check-circle fa-lg"></i> Realizar
                </a>
            </td>
            @endif
            @if($sample->ChoiceTestSample->id_tipo_prueba == 2)
            <td>
                <a href="{{route('evaluation.create', [
                    'evaluation'=> $sample->id_evaluacion, 
                    'election' => $sample->id_eleccion_prueba_muestra,
                    'type' => 'QDA'])}}" class="btn boton" role="button" style="height:30px;padding-top: 10px;">
                    <i class="fa fa-check-circle fa-lg"></i> Realizar
                </a>
            </td>
            @endif
            {{-- Separar --}}
            @if($sample->ChoiceTestSample->id_tipo_prueba == 3)
            <td>
                <a href="{{route('invited.create', [
                    'evaluation'=> $sample->id_evaluacion, 
                    'election' => $sample->id_eleccion_prueba_muestra, 
                    'type' => 'Perfil de consumidores'])}}" class="btn boton" role="button" style="height:30px;padding-top: 10px;">
                    <i class="fa fa-check-circle fa-lg"></i> Realizar
                </a>
            </td>
            @endif

        </tr>
        @endforeach
    </tbody>
</table>