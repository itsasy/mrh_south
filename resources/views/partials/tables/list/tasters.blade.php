<table class="table table-striped table-inverse">
    <thead class="thead-inverse">
        <tr class="text-center">
            <th class="text-nowrap">Nombre</th>
            <th class="text-nowrap">Apellidos</th>
            <th class="text-nowrap">DNI</th>
            <th class="text-nowrap">Grado</th>
            <th class="text-nowrap">Correo</th>
            <th class="text-nowrap">Celular</th>
            <th class="text-nowrap">Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach(range(1,10) as $rango)
        <tr class="text-center">
            <td>Nombre {{$rango}}</td>
            <td>Apellido {{$rango}}</td>
            <td>DNI {{$rango}}</td>
            <td>Grado {{$rango}}</td>
            <td>Correo {{$rango}}</td>
            <td>12345678-{{$rango}}</td>
            <td>
                @include('partials.buttons.edit_or_delete', ['object' =>'taster', 'id' => $rango])
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
