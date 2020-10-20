<table id="data_table" class="table table-striped table-inverse">
    <thead class="thead-inverse">
        <tr class="text-center">
            <th class="text-nowrap">Código</th>
            <th class="text-nowrap">Fecha de registro</th>
            <th class="text-nowrap">Nombre de la muestra</th>
            <th class="text-nowrap">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach(range(1,10) as $rango)
        <tr class="text-center" value="{{$rango}}">
            <td scope="row">ABC123</td>
            <td>08/09/2020</td>
            <td>Quinua Roja</td>
            <td>
                @include('partials.buttons.edit_or_delete', ['object' =>'taster', 'id' => $rango])
            </td>
        </tr>
        @endforeach
    </tbody>
</table>