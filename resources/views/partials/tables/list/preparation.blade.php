<div class="row">
          <div class="col-md-12">
            <div class="card">
<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th class="text-nowrap">Código</th>
            <th class="text-nowrap">Código ortogonal</th>

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
          @foreach($sample->ChoiceTestSample as $index=>$csample)
            <tr class="text-center">
                @if($index == 0)
                <td scope="row" rowspan={{count($sample->ChoiceTestSample)}}>{{$sample->id_muestra}}</td>
                @endif
                <td scope="row" >{{$csample->codigo_ortogonal}}</td>
                @if($index == 0)
                <td class="text-nowrap" rowspan={{count($sample->ChoiceTestSample)}}>{{$sample->fecha_registro}}</td>
                @endif
                @if($index == 0)
                <td rowspan={{count($sample->ChoiceTestSample)}}>{{$sample->nombre_muestra}}</td>
                @endif
                <td>
                        @if($csample->id_tipo_prueba == 1)
                            <a role="button" @if($csample->estado == "CREADA")
                                href="{{route('preparation.create', ['preparation'=> $sample->id_muestra, 'type' => 'Duo-Trio', 'orthogonal_code' => $csample->codigo_ortogonal])}}"
                                style="color:red !important"
                                @elseif($csample->estado == "ASIGNADA") style="color:#e2a210 !important"
                                @else style="color:green !important" @endif>
                                <i class="fa fa-check-circle fa-2x"></i>
                            </a>
        
                        @endif
                   
                </td>
                @if($index == 0)
                    <td rowspan={{count($sample->ChoiceTestSample)}}>
                        <a role="button"  
                        @if($sample->estado_qda == 0)
                                href="{{route('preparation.create', ['preparation'=> $sample->id_muestra, 'type' => 'QDA', 'orthogonal_code' => null])}}"
                                style="color:red !important" @elseif($sample->estado_qda== 1) style="color:#e2a210 !important"
                                @else style="color:green !important" @endif  ><i class="fa fa-check-circle fa-2x"></i> </a>
                    </td>
                @endif
                @if($index == 0)
                
                    <td rowspan={{count($sample->ChoiceTestSample)}}>
                        <a role="button" 
                        @if($sample->estado_PC == 0) href="{{route('preparation.create', ['preparation'=> $sample->id_muestra, 'type' => 'Perfil de consumidores', 'orthogonal_code' => null])}}"
                                style="color:red !important"  @elseif($sample->estado_PC == 1) style="color:#e2a210 !important" 
                                @else style="color:green !important" @endif > <i class="fa fa-check-circle fa-2x"></i> </a>
                    </td>
                @endif
                @if($index == 0)
                <td rowspan={{count($sample->ChoiceTestSample)}}>
                    <a rel="noopener noreferrer" role="button" @if($sample->estado_modelos == 1)
                        href="{{route('orthogonal.show', [$sample->id_muestra])}}" style="color:red !important"
                        @else href="#" style="color:green" @endif>
                        <i class="fa fa-external-link-square fa-2x"></i>
                    </a>
    
    
                </td>
                @endif
                @if($index == 0)
                <td rowspan={{count($sample->ChoiceTestSample)}}>
    
                    <a rel="noopener noreferrer" role="button" @if($sample->codificacion_muestra != null)
                        href="{{route('downloadExcel', [$sample->codificacion_muestra])}}" style="color:green !important"
                        @else href="#" style="color:red" @endif>
                        <i class="fa fa-file-excel-o fa-2x"></i>
                    </a>
    
                </td>
                @endif
                @if($index == 0)
                <td rowspan={{count($sample->ChoiceTestSample)}}>
                    {{$sample->estado_muestra}}
                </td>
                @endif
                
                 <td>
    
                    <a rel="noopener noreferrer" role="button" @if($csample->excel_respuestas_duo_trio != null)
                        href="{{route('downloadExcel', [$csample->excel_respuestas_duo_trio])}}" style="color:green !important;"
                        @else href="#" style="color:#5d5d5d" @endif>
                        <i class="fa fa-file-excel-o fa-2x"></i>
                    </a>
    
                </td>
                
            </tr>
          @endforeach
        @endforeach
    </tbody>
</table>
 </div>
            </div>
          </div>