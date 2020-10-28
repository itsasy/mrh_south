@php
$letras = range('A','Z');
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
          <input type="hidden" name="parametro[]" value="{{$ssp->id_muestra_parametros_estudio}}">
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

        @for ($r = 0; $r < $sample->nro_repeticiones + 1; $r++)

          <tr class="text-center">
            {{-- Bloque --}}
            <td class="align-middle" rowspan="{{$sample->nro_modelos_ortogonales}}">{{$letras[$r]}}</td>
            <input type="hidden" name="bloque[]" value="{{$letras[$r]}}">
            {{-- ITEM --}}
            @for ($o = 0; $o < $sample->nro_modelos_ortogonales; $o++)
              <td class="text-center">{{$o+1}}</td>

              <input type="hidden" name="item[]" value="{{$o+1}}">

              {{-- parámetro --}}
              @foreach($sampleStudyParameters as $p => $ssp)
              <td>
                <input type="number" name="valor_{{$r}}_{{$o}}_{{$ssp->id_muestra_parametros_estudio}}" id="valor_{{$r}}_{{$o}}_{{$ssp->id_muestra_parametros_estudio}}" value = "5" required min="0">
              </td>
              @endforeach
          </tr>
          @endfor
          @endfor
      </tbody>
    </table>
  </div>
</div>


<input type="hidden" name="nro_repeticion" value="{{$sample->nro_repeticiones}}">
<input type="hidden" name="nro_modelos" value="{{$sample->nro_modelos_ortogonales}}">
<input type="hidden" name="parameter" value="{{count($sampleStudyParameters)}}">
<input type="hidden" name="idMuestra" value="{{$sample->id_muestra}}">