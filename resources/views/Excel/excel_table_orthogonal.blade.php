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
              <td colspan="1"
                style="vertical-align: middle; height:30px;font-weight: bold;font-size: 15px !important; text-transform: uppercase;  text-align: center; background-color: #EFEDEC;">
                Bloque
              </td>
              <td colspan="1"
                style="vertical-align: middle; height:30px;font-weight: bold;font-size: 15px !important; text-transform: uppercase;  text-align: center; background-color: #EFEDEC;">
                Item
              </td>

              @for($parametros = 0 ;$parametros < 3 ;$parametros++) <td colspan="1"
                style="vertical-align: middle; height:30px;width:30px;font-weight: bold;font-size: 15px !important; text-transform: uppercase;  text-align: center; background-color: #EFEDEC;">
                Parametros {{$parametros +1}}
                </td>

                @endfor
            </tr>
          </thead>

          <tbody>
            <tr>
              <td colspan="1" rowspan="1"
                style="vertical-align: middle; height:30px;font-weight: bold;font-size: 15px !important; text-transform: uppercase;  text-align: center; ">
                Parámetro
              </td>

              <td colspan="1" rowspan="1"
                style="vertical-align: middle; height:30px;font-weight: bold;font-size: 15px !important; text-transform: uppercase;  text-align: center; ">
                Nombre
              </td>
              <td colspan="1" rowspan="1"></td> <td colspan="1" rowspan="1"></td>
            </tr>
            @for($parametros = 0 ;$parametros < 3 ;$parametros++) <tr>
              <td colspan="1" rowspan="1"
                style="vertical-align: middle; height:30px;font-weight: bold;font-size: 15px !important; text-transform: uppercase;  text-align: center; background-color: #EFEDEC;">
                Parametros {{$parametros +1}}
              </td>

              <td colspan="1" rowspan="1"
                style="vertical-align: middle; height:30px;font-weight: bold;font-size: 15px !important; text-transform: uppercase;  text-align: center; background-color: #EFEDEC;">
                Texto {{$parametros +1}}
              </td>
              </tr>
              @endfor

              @for($num_repeticion = 0 ;$num_repeticion < 3 ;$num_repeticion++) @for($num_mod_hortogonales=0
                ;$num_mod_hortogonales < 5 ;$num_mod_hortogonales++) <tr>
                <td colspan="1" rowspan="1"
                  style="vertical-align: middle; height:30px;font-weight: bold;font-size: 15px !important; text-transform: uppercase;  text-align: center; background-color: #EFEDEC;">
                  A
                </td>

                <td colspan="1" rowspan="1"
                  style="vertical-align: middle; height:30px;font-weight: bold;font-size: 15px !important; text-transform: uppercase;  text-align: center; background-color: #EFEDEC;">
                  {{$num_mod_hortogonales+1}}
                </td>
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