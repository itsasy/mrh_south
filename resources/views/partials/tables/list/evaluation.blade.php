<table class="table table-striped table-inverse">
    <thead class="thead-inverse">
        <tr class="text-center">
            <th class="text-nowrap">Código</th>
            <th class="text-nowrap">Fecha de registro</th>
            <th class="text-nowrap">Nombre de la muestra</th>
            <th class="text-nowrap">Dúo - Trío</th>
            <th class="text-nowrap">QDA</th>
            {{--  <th class="text-nowrap">Aceptabilidad</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach($evaluation as $sample)
        <tr class="text-center">
            <td scope="row">ABC123</td>
            <td>08/09/2020</td>
            <td>Quinua Roja</td>
            <td>
                <a href="{{route('evaluation.create', [
                    'evaluation'=> $sample->id_evaluacion, 
                    'election' => $sample->id_eleccion_prueba_muestra,
                    'type' => 'Duo-Trio'])}}" role="button">
                    <i class="fas fa-check-circle fa-lg"></i>
                </a></td>
            <td>
                <a href="{{route('evaluation.create', [
                    'evaluation'=> $sample->id_evaluacion, 
                    'election' => $sample->id_eleccion_prueba_muestra,
                    'type' => 'QDA'])}}" role="button">
                    <i class="fas fa-check-circle fa-lg"></i>
                </a>
            </td>
            {{-- <td>
                <a href="{{route('evaluation.create', ['evaluation'=> $id_evaluacion, 'type' => 'Perfil de consumidores', 'election' => $id_eleccion_prueba_muestra])}}"
            role="button">
            <i class="fas fa-check-circle fa-lg"></i>
            </a>
            </td> --}}
        </tr>
        @endforeach
    </tbody>
</table>