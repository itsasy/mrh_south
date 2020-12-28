<div class="row">
          <div class="col-md-12">
            <div class="card">
<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th class="text-nowrap">Código</th>
            <th class="text-nowrap">Fecha de registro</th>
            <th class="text-nowrap">Nombre de la muestra</th>
            <th class="text-nowrap">Dúo - Trío</th>
            <th class="text-nowrap">QDA</th>
            <th class="text-nowrap">Perfil de consumidores</th>
            <th class="text-nowrap">Modelos ortogonales</th>
            <th class="text-nowrap">Codificación de muestras</th>
            <th class="text-nowrap">Estado</th>
            <th class="text-nowrap">Respuestas Dúo - Trío</th>

        </tr>
    </thead>
    <tbody>
        @foreach($samples as $sample)
        <tr class="text-center">
            <td scope="row">{{$sample->id_muestra}}</td>
            <td class="text-nowrap">{{$sample->fecha_registro}}</td>
            <td>{{$sample->nombre_muestra}}</td>
            <td>
                @foreach($sample->ChoiceTestSample as $csample)

                @if($csample->id_tipo_prueba == 1)
                <a role="button" @if($csample->estado == "CREADA")
                    href="{{route('preparation.create', ['preparation'=> $sample->id_muestra, 'type' => 'Duo-Trio'])}}"
                    style="color:red !important"
                    @elseif($csample->estado == "ASIGNADA") style="color:#e2a210 !important"
                    @else style="color:green !important" @endif>
                    <i class="fa fa-check-circle fa-2x"></i>
                </a>


                @endif

                @endforeach
            </td>
            <td>
                @foreach($sample->ChoiceTestSample as $csample)

                @if($csample->id_tipo_prueba == 2)
                <a role="button" @if($csample->estado == "CREADA")
                    href="{{route('preparation.create', ['preparation'=> $sample->id_muestra, 'type' => 'QDA'])}}"
                    style="color:red !important"
                    @elseif($csample->estado == "ASIGNADA") style="color:#e2a210 !important"
                    @else style="color:green !important" @endif>
                    <i class="fa fa-check-circle fa-2x"></i>
                </a>

                @endif

                @endforeach

            </td>
            <td>
                @foreach($sample->ChoiceTestSample as $csample)

                @if($csample->id_tipo_prueba == 3)
                <a role="button" @if($csample->estado == "CREADA")
                    href="{{route('preparation.create', ['preparation'=> $sample->id_muestra, 'type' => 'Perfil de consumidores'])}}"
                    style="color:red !important"
                    @elseif($csample->estado == "ASIGNADA") style="color:#e2a210 !important" 
                    @else style="color:green !important" @endif>
                    <i class="fa fa-check-circle fa-2x"></i>
                </a>


                @endif

                @endforeach

            </td>
            <td>
                <a rel="noopener noreferrer" role="button" @if($sample->estado_modelos == 1)
                    href="{{route('orthogonal.show', [$sample->id_muestra])}}" style="color:red !important"
                    @else href="#" style="color:green" @endif>
                    <i class="fa fa-external-link-square fa-2x"></i>
                </a>


            </td>
            <td>

                <a rel="noopener noreferrer" role="button" @if($sample->codificacion_muestra != null)
                    href="{{route('downloadExcel', [$sample->codificacion_muestra])}}" style="color:green !important"
                    @else href="#" style="color:red" @endif>
                    <i class="fa fa-file-excel-o fa-2x"></i>
                </a>

            </td>
            
           
            <td>
                {{$sample->estado_muestra}}
            </td>
             <td>

                <a rel="noopener noreferrer" role="button" @if($sample->excel_respuestas_duo_trio != null)
                    href="{{route('downloadExcel', [$sample->excel_respuestas_duo_trio])}}" style="color:green !important;"
                    @else href="#" style="color:#5d5d5d" @endif>
                    <i class="fa fa-file-excel-o fa-2x"></i>
                </a>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
 </div>
            </div>
          </div>