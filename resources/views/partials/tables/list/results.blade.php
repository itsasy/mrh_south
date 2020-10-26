<table class="table table-striped table-inverse">
    <thead class="thead-inverse">
        <tr class="text-center">
            <th class="text-nowrap">Código</th>
            <th class="text-nowrap">Fecha de registro</th>
            <th class="text-nowrap">Nombre de la muestra</th>
            <th class="text-nowrap">Dúo - Trío</th>
            <th class="text-nowrap">QDA</th>
            <th class="text-nowrap">Aceptabilidad</th>
        </tr>
    </thead>
    <tbody>
        @foreach(range(1,10) as $rango)
        <tr class="text-center">
            <td>Código {{$rango}}</td>
            <td>Fecha de registro {{$rango}}</td>
            <td>Nombre de la muestra {{$rango}}</td>
            <td>Dúo - Trío {{$rango}}</td>
            <td>QDA {{$rango}}</td>
            <td>Aceptabilidad {{$rango}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
