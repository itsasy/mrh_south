<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th class="text-nowrap">Código</th>
            <th class="text-nowrap">Fecha de registro</th>
            <th class="text-nowrap">Nombre de la muestra</th>
            <th class="text-nowrap">Dúo - Trío</th>
            <th class="text-nowrap">QDA</th>
            <th class="text-nowrap">Perfil de consumidores</th>
            <th class="text-nowrap">Modelos octogonales</th>
            <th class="text-nowrap">Codificación de muestras</th>
            <th class="text-nowrap">Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach(range(1,10) as $rango)
        <tr class="text-center">
            <td scope="row">ABC123</td>
            <td>08/09/2020</td>
            <td>Quinua Roja</td>
            <td>
                <a href="{{route('preparation.show', ['Dúo - Trío','MPF820'])}}" rel="noopener noreferrer" role="button">
                    <i class="fas fa-check-circle fa-lg"></i>
                </a></td>
            <td>
                <a href="{{route('preparation.show', ['QDA','MPF820'])}}" rel="noopener noreferrer" role="button">
                    <i class="fas fa-check-circle fa-lg"></i>
                </a>
            </td>
            <td>
                <a href="{{route('preparation.show', ['Perfil de consumidores','MPF820'])}}" rel="noopener noreferrer" role="button">
                    <i class="fas fa-check-circle fa-lg"></i>
                </a>
            </td>
            <td>
                <a href="{{route('orthogonal.show', ['MPF820'])}}" rel="noopener noreferrer" role="button">
                    <i class="fas fa-external-link-square-alt fa-lg"></i>
                </a>
            </td>
            <td>
                <a href="#" target="_blank" rel="noopener noreferrer" role="button">
                    <i class="fas fa-file-pdf fa-lg"></i>
                </a>
            </td>
            <td>
                Creada
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
