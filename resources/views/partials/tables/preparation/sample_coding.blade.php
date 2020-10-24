@php
$letras= ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U"];
@endphp
<div class="row">
  <div class="col-4">
    <table class="table table-striped table-inverse">
      <thead>
        <tr class="text-center">
          <th class="text-nowrap">Parámetro</th>
          <th class="text-nowrap">Nombre</th>
        </tr>
      </thead>
      <tbody>
        @foreach($sampleStudyParameters as $index => $ssp)
        <tr class="text-center">
          <td> {{$index+1}}</td>
          <td>{{$ssp->parametro}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="col-8">
    <table class="table">
      <thead>
        <tr class="text-center">
          <th class="text-nowrap">Bloque</th>
          <th class="text-nowrap">Item</th>
          @foreach($sampleStudyParameters as $index => $ssp)
          <th class="text-nowrap">{{$ssp->parametro}}</th>

          @endforeach

        </tr>
        <tr>
        </tr>
      </thead>
      <tbody>
        @for ($r = 0; $r < $sample->nro_repeticiones; $r++)

          <tr class="text-center">

            <td class="align-middle" rowspan="{{$sample->nro_modelos_ortogonales}}">{{$letras[$r]}}</td>

            @for ($o = 0; $o < $sample->nro_modelos_ortogonales; $o++)


              <td class="text-center">{{$o+1}}</td>
               @foreach($sampleStudyParameters as $p => $ssp)
                  <td>
                    <input type="text" name="valor_{{$r}}_{{$o}}_{{$p}}" id="valor_{{$r}}_{{$o}}_{{$p}}">
                  </td>
              @endforeach
             
          </tr>
          @endfor

          </tr>

          @endfor

      </tbody>
    </table>
  </div>
</div>