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
        @foreach($samples as $sample)
        <tr class="text-center">
            <td scope="row">{{$sample->id_muestra}}</td>
            <td class="text-nowrap">{{$sample->fecha_registro}}</td>
            <td>{{$sample->nombre_muestra}}</td>
            <td>
                @foreach($sample->ChoiceTestSample as $csample)

                    @if($csample->id_tipo_prueba == 1)
                      <a  role="button"
                       @if($csample->estado == "CREADA") href="{{route('preparation.create', ['preparation'=> $sample->id_muestra, 'type' => 'Duo-Trio'])}}"  style="color:red" 
                       @elseif($csample->estado == "ASIGNADA") style="color:#e2a210"
                       @else  style="color:green" @endif>
                        <i class="fas fa-check-circle fa-lg" ></i>
                      </a>
                  
                   
                    @endif

                @endforeach
            </td>
            <td>
                @foreach($sample->ChoiceTestSample as $csample)

                    @if($csample->id_tipo_prueba == 2)
                      <a  role="button"
                       @if($csample->estado == "CREADA") href="{{route('preparation.create', ['preparation'=> $sample->id_muestra, 'type' => 'QDA'])}}" style="color:red" 
                        @elseif($csample->estado == "ASIGNADA") style="color:#e2a210"
                       @else  style="color:green" @endif>
                         <i class="fas fa-check-circle fa-lg"></i>
                      </a>
                   
                    @endif

                @endforeach

            </td>
            <td>
                @foreach($sample->ChoiceTestSample as $csample)

                    @if($csample->id_tipo_prueba == 3)
                      <a  role="button"
                       @if($csample->estado == "CREADA") href="{{route('preparation.create', ['preparation'=> $sample->id_muestra, 'type' => 'Perfil de consumidores'])}}" style="color:red" 
                        @elseif($csample->estado == "ASIGNADA") style="color:#e2a210"
                       @else   style="color:green" @endif>
                        <i class="fas fa-check-circle fa-lg" ></i>
                      </a>
                    
                    
                    @endif

                @endforeach

            </td>
            <td>


                <a rel="noopener noreferrer" role="button" @if($sample->estado_modelos == 1)
                    href="{{route('orthogonal.show', [$sample->id_muestra])}}" style="color:red"
                    @else href="#" style="color:green" @endif>
                    <i class="fas fa-external-link-square-alt fa-lg"></i>
                </a>


            </td>
            <td>

                <a rel="noopener noreferrer" role="button" @if($sample->codificacion_muestra != null)
                    href="{{route('downloadExcel', [$sample->codificacion_muestra])}}" style="color:green"
                    @else href="#" style="color:red" @endif>
                    <i class="far fa-file-excel fa-lg"></i>
                </a>

            </td>
            <td>
                {{$sample->estado_muestra}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>