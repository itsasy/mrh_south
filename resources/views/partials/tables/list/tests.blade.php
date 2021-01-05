{{-- Paginate --}}
{{ $listSample->links() }}
{{-- {{ $listSample->render("pagination::default") }} --}}
<div class="row">
          <div class="col-md-12">
            <div class="card">
<table id = "table" class="table table-striped table-inverse" >
    <thead class="thead-inverse">
        <tr class="text-center">
            <th class="text-nowrap">Código</th>
            <th class="text-nowrap">Fecha de registro</th>
            <th class="text-nowrap">Nombre de la muestra</th>
            <th class="text-nowrap">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($listSample as $sample)
        <tr class="text-center" value="{{$sample->id_muestra}}">
            <td scope="row">{{$sample->id_muestra}}</td>
            <td>{{$sample->fecha_registro}}</td>
            <td>{{$sample->nombre_muestra}}</td>
            <td>
                @include('partials.buttons.edit_or_delete', ['object' =>'test', 'id' => $sample->id_muestra])
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
 </div>
            </div>
          </div>