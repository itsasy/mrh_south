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
            <td scope="row">ABC123</td>
            <td>08/09/2020</td>
            <td>Quinua Roja</td>
            <td>
                <a href="#" target="_blank" rel="noopener noreferrer" role="button">
                    <i class="fas fa-check-circle fa-lg"></i>
                </a></td>
            <td>
                <a href="#" target="_blank" rel="noopener noreferrer" role="button">
                    <i class="fas fa-check-circle fa-lg"></i>
                </a>
            </td>
            <td>
                <a href="#" target="_blank" rel="noopener noreferrer" role="button">
                    <i class="fas fa-check-circle fa-lg"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
