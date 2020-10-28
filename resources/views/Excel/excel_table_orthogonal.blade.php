<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <style>
    table,
    th,
    td {}

    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td,
    th {
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
  </style>
</head>
@php
$letras = range('A','Z');
@endphp
<body>
  <div class="header-pdf" style="padding: 15px !important;">
    <div class="row">
      <div class="col-12">
        <table class="table">
          <thead>
            <tr>
              <td colspan="5"
                style="vertical-align: middle; height:35px;font-weight: bold;font-size: 20px !important; text-transform: uppercase;  text-align: center; background-color: #45B32D;border: 5px solid #45B32D;">
                Preparación de la prueba
              </td>

            </tr>
            <tr>
              <td colspan="5" style="height:30px;">
              </td>
            </tr>
            <tr>
              <td rowspan="1" colspan="2"
                style="vertical-align: middle; width:20px;height:25px;font-weight: bold;font-size: 15px !important; text-transform: uppercase;  border: 5px solid #878783;">
                Código:
              </td>

              <td rowspan="1" colspan="2"
                style="vertical-align: middle; width:20px; height:25px;font-size: 15px !important; text-transform: uppercase; border: 5px solid #878783;">
                {{$sampleStudyParameters[0]->Sample->id_muestra}}
              </td>
            </tr>
            <tr>
              <td rowspan="1" colspan="2"
                style="vertical-align: middle; width:20px;height:25px;font-weight: bold;font-size: 15px !important; text-transform: uppercase;  border: 5px solid #878783; ">
                Fecha de registro:
              </td>

              <td rowspan="1" colspan="2"
                style="vertical-align: middle; width:20px; height:25px;font-size: 15px !important; text-transform: uppercase;   border: 5px solid #878783;">
                {{$sampleStudyParameters[0]->Sample->fecha_registro}}
              </td>
            </tr>
             <tr>
              <td rowspan="1" colspan="2"
                style="vertical-align: middle; width:20px;height:25px;font-weight: bold;font-size: 15px !important; text-transform: uppercase;  border: 5px solid #878783; ">
                Nombre del encargado: 
              </td>

              <td rowspan="1" colspan="2"
                style="vertical-align: middle; width:20px; height:25px;font-size: 15px !important; text-transform: uppercase;   border: 5px solid #878783;">
                 {{$sampleStudyParameters[0]->Sample->responsable}}
              </td>
            </tr>
            <tr>
              <td rowspan="1" colspan="2"
                style="vertical-align: middle; width:20px;height:25px;font-weight: bold;font-size: 15px !important; text-transform: uppercase;  border: 5px solid #878783; ">
                Procedencia:
              </td>

              <td rowspan="1" colspan="2"
                style="vertical-align: middle; width:20px; height:25px;font-size: 15px !important; text-transform: uppercase;  border: 5px solid #878783;">
                 {{$sampleStudyParameters[0]->Sample->procedencia}}
              </td>
            </tr>
            <tr>
              <td colspan="5" style="height:30px;">
              </td>
            </tr>

            <tr>
              <td rowspan="1"
                style="vertical-align: middle; width:20px;height:30px;font-weight: bold;font-size: 15px !important; text-transform: uppercase;  text-align: center;border: 5px solid #50AD41;background-color: #50AD41; ">
                Parámetro
              </td>

              <td rowspan="1"
                style="vertical-align: middle; width:20px; height:30px;font-weight: bold;font-size: 15px !important; text-transform: uppercase;  text-align: center; border: 5px solid #50AD41;background-color: #50AD41;">
                Nombre
              </td>
            </tr>


            @foreach($sampleStudyParameters as $p => $parametros){
            <tr>
              <td rowspan="1"
                style="vertical-align: middle; height:20px;font-size: 15px !important; text-transform: uppercase;  text-align: center;  border: 5px solid #878783;">
                {{$p +1}}
              </td>

              <td rowspan="1"
                style="vertical-align: middle; height:20px;font-size: 15px !important; text-transform: uppercase;  text-align: center;  border: 5px solid #878783;">
                 {{$parametros->parametro}}
              </td>
              </tr>
              @endforeach
              <tr>
                <td colspan="1"  style="height:30px;">
                </td>
              </tr>
             
          </thead>

          <tbody>

            <tr>
              <td
                style="vertical-align: middle; height:30px;font-weight: bold;font-size: 15px !important; text-transform: uppercase;  text-align: center; background-color: #50AD41; border: 5px solid #878783;">
                Bloque
              </td>
              <td
                style="vertical-align: middle; height:30px;font-weight: bold;font-size: 15px !important; text-transform: uppercase;  text-align: center; background-color: #50AD41; border: 5px solid #878783;">
                Item
              </td>
              @foreach($sampleStudyParameters as $p => $parametros)

               <td style="vertical-align: middle; height:30px;width:30px;font-weight: bold;font-size: 15px !important; text-transform: uppercase;  text-align: center; background-color: #50AD41; border: 5px solid #878783;">
                {{$parametros->parametro}}
                </td>

              @endforeach
            </tr>
        

            @for($num_repeticion = 0 ;$num_repeticion < $sampleStudyParameters[0]->Sample->nro_repeticiones + 1 ;$num_repeticion++) 
            @for($num_mod_hortogonales=0;$num_mod_hortogonales < $sampleStudyParameters[0]->Sample->nro_modelos_ortogonales ;$num_mod_hortogonales++) <tr>
              <td rowspan="1"
                style="vertical-align: middle; height:20px;font-size: 15px !important; text-transform: uppercase;  text-align: center; border: 5px solid #878783; ">
                {{$letras[$num_repeticion]}}
              </td>

              <td rowspan="1"
                style="vertical-align: middle; height:20px;font-size: 15px !important; text-transform: uppercase;  text-align: center;  border: 5px solid #878783;">
                {{$num_mod_hortogonales+1}}
              </td>
                
                @foreach($sampleStudyParameters as $p => $parametros)
                  <td rowspan="1" style="vertical-align: middle; height:20px;font-size: 15px !important; text-transform: uppercase;  text-align: center;  border: 5px solid #878783;">
                    {{$dataOrthogonalExcel[$num_repeticion][$num_mod_hortogonales][$parametros->id_muestra_parametros_estudio]}}
                  </td>
                 @endforeach
              </tr>
              @endfor

              @endfor

          </tbody>

        </table>
      </div>
    </div>
  </div>
</body>

</html>