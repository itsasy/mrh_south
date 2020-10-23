<table id="data_table" class="table table-striped table-inverse">
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
        @foreach($user_list as $user)
        <tr class="text-center" value="{{$user->id_usuario}}">
            <td>{{$user->nombres}}</td>
            <td>{{$user->apellidos}}</td>
            <td>{{$user->nro_documento}}</td>
            <td>{{$user->grado}}</td>
            {{-- Se cambiará el campo username por correo --}}
            <td>{{$user->username}}</td>
            <td>{{$user->celular}}</td>
            <td>
                @include('partials.buttons.edit_or_delete', ['object' =>'taster', 'id' => $user->id_usuario])
            </td>
        </tr>
        @endforeach
    </tbody>
</table>