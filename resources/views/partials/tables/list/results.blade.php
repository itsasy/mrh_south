<table class="table table-striped table-inverse">
    <thead class="thead-inverse">
        <tr class="text-center">
            <th class="text-nowrap">Código</th>
            <th class="text-nowrap">Fecha de registro</th>
            <th class="text-nowrap">Nombre de la muestra</th>
            <th class="text-nowrap">Tipo de Prueba</th>
            <th class="text-nowrap">PDF</th>
        </tr>
    </thead>
    <tbody>
        @foreach($choiceTestSample as $key => $sample)
        <tr class="text-center">
            <td>{{$sample->id_muestra}}</td>
            <td>{{$sample->Sample->fecha_registro}}</td>

            <td>{{$sample->Sample->nombre_muestra}}</td>

            @if($sample->id_tipo_prueba == 1)
            <td>Dúo Trío</td>
            @endif

            @if($sample->id_tipo_prueba == 2)
            <td>QDA</td>
            @endif

            @if($sample->id_tipo_prueba == 3)
            <td>Perfil de consumidores</td>
            @endif

            <td>
                <a href="{{'/pdf/' . $sample->pdf_resultados}}" target="_blank" class="text-danger"><i
                        class="fas fa-file-pdf fa-lg"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>