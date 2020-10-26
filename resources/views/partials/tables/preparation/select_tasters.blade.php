<table class="table table-striped table-inverse">
    <thead class="thead-inverse">
        <tr class="text-center">
            <th class="text-nowrap">Id</th>
            <th class="text-nowrap">Juez</th>
            <th class="text-nowrap">Acción</th>

        </tr>
    </thead>
    <tbody>
        @foreach(range(1,10) as $rango)
        <tr class="text-center">
            <td>Id {{$rango}}</td>
            <td>Juez {{$rango}}</td>
            <td>Acción {{$rango}}</td>
        </tr>
       @endforeach
    </tbody>
</table>
