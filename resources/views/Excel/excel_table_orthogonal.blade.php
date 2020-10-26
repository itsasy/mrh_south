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

<body>
  <div class="header-pdf" style="padding: 15px !important;">
    <div class="row">
      <div class="col-12">
        <table class="table">
          <thead>
            <tr>
              <td colspan="5"
                style="vertical-align: middle; height:35px;font-weight: bold;font-size: 20px !important; text-transform: uppercase;  text-align: center; background-color: #EFEDEC;">
                Preparación de la prueba
              </td>

            </tr>

            <tr>
              <td colspan="5" style="height:30px;">
              </td>
            </tr>

            <tr>
              <td rowspan="1"
                style="vertical-align: middle; width:20px;height:30px;font-weight: bold;font-size: 15px !important; text-transform: uppercase;  text-align: center;border: 5px solid #878783;background-color: #EFEDEC; ">
                Parámetro
              </td>

              <td rowspan="1"
                style="vertical-align: middle; width:20px; height:30px;font-weight: bold;font-size: 15px !important; text-transform: uppercase;  text-align: center; border: 5px solid #878783;background-color: #EFEDEC;">
                Nombre
              </td>
            </tr>


            @for($parametros = 0 ;$parametros < 3 ;$parametros++) <tr>
              <td rowspan="1"
                style="vertical-align: middle; height:30px;font-size: 15px !important; text-transform: uppercase;  text-align: center;  border: 5px solid #878783;">
                Parametros {{$parametros +1}}
              </td>

              <td rowspan="1"
                style="vertical-align: middle; height:30px;font-size: 15px !important; text-transform: uppercase;  text-align: center;  border: 5px solid #878783;">
                Texto {{$parametros +1}}
              </td>
              </tr>
              @endfor
              <tr>
                <td colspan="1"  style="height:30px;">
                </td>
              </tr>
             
          </thead>

          <tbody>

            <tr>
              <td
                style="vertical-align: middle; height:30px;font-weight: bold;font-size: 15px !important; text-transform: uppercase;  text-align: center; background-color: #EFEDEC; border: 5px solid #878783;">
                Bloque
              </td>
              <td
                style="vertical-align: middle; height:30px;font-weight: bold;font-size: 15px !important; text-transform: uppercase;  text-align: center; background-color: #EFEDEC; border: 5px solid #878783;">
                Item
              </td>

              @for($parametros = 0 ;$parametros < 3 ;$parametros++) <td
                style="vertical-align: middle; height:30px;width:30px;font-weight: bold;font-size: 15px !important; text-transform: uppercase;  text-align: center; background-color: #EFEDEC; border: 5px solid #878783;">
                Parametros {{$parametros +1}}
                </td>

                @endfor
            </tr>
        

            @for($num_repeticion = 0 ;$num_repeticion < 3 ;$num_repeticion++) 
            @for($num_mod_hortogonales=0;$num_mod_hortogonales < 5 ;$num_mod_hortogonales++) <tr>
              <td rowspan="1"
                style="vertical-align: middle; height:30px;font-size: 15px !important; text-transform: uppercase;  text-align: center; border: 5px solid #878783; ">
                A+{{$num_repeticion+1}}
              </td>

              <td rowspan="1"
                style="vertical-align: middle; height:30px;font-size: 15px !important; text-transform: uppercase;  text-align: center;  border: 5px solid #878783;">
                {{$num_mod_hortogonales+1}}
              </td>
                
                 @for($parametros = 0 ;$parametros < 3 ;$parametros++) 
                  <td rowspan="1"
                    style="vertical-align: middle; height:30px;font-size: 15px !important; text-transform: uppercase;  text-align: center;  border: 5px solid #878783;">
                    
                  </td>
                 @endfor
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