<!DOCTYPE html>
<html lang="en">
<head>
  
       <meta charset="utf-8">
        <link rel="stylesheet" href="{{asset('css/pure-min.css')}}" />
        <link rel="stylesheet" href="{{asset('css/bootstrap-pdf.min.css')}}"/>
    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0px;
            padding: 15px !important;
        }

        table,
        th,
        td {
            border: 1px solid #acabab;
            padding: 0.2em;
            font-size: 12px;

        }

        .row.space {
            padding: 10px !important;
        }

        body {
            padding: 30px;
            font-family: times-new-roman-font;
            font-size: 13px !important;
        }

        .contenedor {
            text-align: center;
            width: 100%;
        }

        .h2-titulo {
            caption-side: top;
            text-align: center;
            font-size: 15px;
            padding-bottom: 20px;
            font-weight: bold;
        }

        .form-control {
            border: 0px;
            font-size: 15px !important;
            height: 20px;
            margin: 15px 0px;
            font-weight: 400;
            background-color: #1d7907;
            -webkit-box-shadow: black;
            border: 1px solid #1d7907;
            border-radius: 0px;
            text-align: left;
            color: white;

        }

     
        .contenedor-h3 {
            margin: 20px auto;
            padding: 20px;
            width: 50%;
            border: 1px solid #acabab;
            font-size: 15px;
        }

        .contenedor>.pie-container {
            width: 410px;
            height: 410px;
            margin: 0 auto;
        }

        .ocultar {
            display: none;
        }

        .col-xs-12.data1 {
            font-size: 12px;
            font-weight: bold;
        }

        .p-30 {
            padding-left: 30px;
        }

        .border-table {
            border: 1px solid #acabab;
            border-radius: 0px;
        }

        .center-el {
            text-align: center;
        }
        .border-fondo {
          background : #1d7907;
          color: white;
          height: 10px !important;
          text-align: center;
          
        }
    </style>
</head>
<body class='body-custom'>

  <div class="header-pdf" style="padding: 15px !important;">
        <h1 class="h2-titulo"> RESULTADO DEL ANÁLISIS - Nº 15</h1>
        <div class="row">

            <div class="col-12">
                <table class="table">
                  @php
                  
                  @endphp
                  
                    <tr>
                        <td colspan="4" class ="border-fondo">INFORMACIÓN DE LA PRUEBA </td>
                    </tr>
                    <tr>
                        <td><strong>Código:</strong></td>
                        <td>{{$sample->id_muestra}}</td>
                        <td><strong>Fecha:</strong></td>
                        <td>{{\Carbon\Carbon::parse($sample->fecha_registro)->format('d-m-Y')}}</td>
                    </tr>
                    <tr>
                        <td><strong>Tipo de prueba:</strong></td>
                        <td>Perfil de consumidores</td>
                        <td><strong>Hora:</strong></td>
                        <td>{{\Carbon\Carbon::parse($sample->fecha_registro)->format('H:m a')}}</td>
                    </tr>
                    <tr>
                          <td colspan="4" class ="border-fondo">INFORMACIÓN DE LA MUESTRA </td>

                    </tr>
                   <tr>
                        <td><strong>Nombre de muestra:</strong></td>
                        <td>{{$sample->nombre_muestra}}</td>
                        <td><strong>Variedad:</strong></td>
                        <td>{{$sample->variedad}}</td>
                    </tr>
                    <tr>
                        <td><strong>Procedencia:</strong></td>
                        <td>{{$sample->procedencia}}</td>
                        <td><strong>Humedad:</strong></td>
                        <td>{{$sample->humedad}}</td>
                    </tr>
                     <tr>
                        <td><strong>Tamaño de grano:</strong></td>
                        <td>{{$sample->tamanio_grano}}</td>
                        <td><strong>Responsable:</strong></td>
                        <td>{{$sample->responsable}}</td>
                    </tr>
                    <tr>
                          <td colspan="4" class ="border-fondo">MODELO ORTOGONAL</td>

                    </tr>
                </table>
            </div>

        </div>
    </div>

     
      <div class="row space">
        <div class="form-control">
          <div class="col-xs-12 data1">
            <p>I. Planteamiento de la Hipótesis:</p>
          </div>
        </div>
      </div>
      <div class="row space">
        <div class="col-xs-12 data11">

          <p>Hp: No hay diferencia entre las muestras.</p>
          <p>Ha: Si exiten diferencias entre las muestras.</p>


        </div>
      </div>
      <div class="row space">
        <div class="form-control">
          <div class="col-xs-12 data1">
            <p>II. Elección del nivel de significación ( α ):</p>
          </div>
        </div>
      </div>
      <div class="row space">
        <div class="col-xs-12 data11">
          <p>El nivel de significación asignado para esta prueba es: <b>0,05</b>.</p>
        </div>
      </div>
      <div class="row space">
        <div class="form-control">
          <div class="col-xs-12 data1">
            <p>III. Tipo de prueba de la hipótesis:</p>
          </div>
        </div>
      </div>
      <div class="row space">
        <div class="col-xs-12 data11">
          <p>El tipo de prueba es </p>

        </div>
      </div>
      <div class="row space">
        <div class="form-control">
          <div class="col-xs-12 data1">
            <p>IV. Suposiciones:</p>
          </div>
        </div>
      </div>
      <div class="row space">
        <div class="col-xs-12 data11">
          <p>Los datos siguen una distribución Dúo - Trío normal</p>
          <p>Las muestras son elegidas aleatoriamente (al azar).</p>
        </div>
      </div>

      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />


      <div class="row space">
        <div class="form-control">
          <div class="col-xs-12 data1">
            <p>V. Criterios de decisión:</p>
          </div>
        </div>
      </div>
      <div class="row space">
        <div class="col-xs-12 data11">

          <p>Se acepta Hp si Tcal <= Ttab (1-α, n -1) </p> <p>Se rechaza Hp si X<sup>2</sup>cal > X<sup>2</sup>tab</p>


          <p>Se rechaza Hp si T<sub>2</sub> > F<sub>(1-α, k -1, (n-1)(k-1))</sub></p>

          <p>Se rechaza Hp si X<sup>2</sup>cal > X<sup>2</sup>tab</p>

        </div>
      </div>

      <div class="row space">
        <div class="form-control">
          <div class="col-xs-12 data1">
            <p>VI. Desarrollo de la prueba estadística:</p>
          </div>
        </div>
      </div>
      <div class="row space">
        <div class="col-xs-12 data11">
          <p> Número de respuestas acertadas ( X ): <b>5</b></p>
          <p>Número de repeticiones ( r ): <b>5</b></p>
          <p>Número de muestras ( m ): <b>5</b></p>
          <p>Número de jueces ( j ): <b>5</b></p>
          <p>Nivel de significación ( α ): <b>5</b></p>
          <p>Probabilidad de no ocurrencia ( q ): <b>5</b></p>
          <p>Probabilidad de no ocurrencia ( q ): <b>5</b></p>




          <p>Número de pruebas realizadas totales ( n ): <b>7 </b></p>
          <p> Número de respuestas no acertadas ( X2 ): <b>7</b></p>

          <p>Número de muestras ( k ): <b>7</b></p>
          <p>Número de jueces ( n ): <b>7</b></p>
          <p>Nivel de significación ( α ): <b>7</b></p>
          <p>Cálculo de F cal: F<sub>(1-α, k -1, (n-1)(k-1))</sub> = F<sub>7</sub> = 2,78 </p>
          <p>Cálculo de R:</p>

          <p>Cálculo del estadístico correspondiente:</p>
          <p>A2 = 5 </p>
          <p>B2 = 5 </p>
          <p>T2 = 5</p>

        </div>
      </div>
      <br>
      <div class="row space">
        <div class="col-xs-12 data11">

          <p>Grados de Libertad (n-1) <b> 5</b></p>
          <p>Media ( M = n * p ): <b> 5</b></p>
          <p>Desviación estandar ( S = n * p * q ) <b> 5</b></p>
          <p> Cálculo del valor de Ttab: <b> 21.0</b></p>
          <p> Cálculo del valor de Tcal: <b> 7</b></p>
          <br>
          <p> Donde:</p>
          <p> X = Número total de aciertos.</p>
          <p> n = Número total de ensayos.</p>
          <p> q = Probabilidad de la no ocurrencia del evento, para esta prueba es de 0,5.</p>

        </div>
      </div>

      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />

      <div class="row space">
        <div class="form-control">
          <div class="col-xs-12 data1">
            <p>VII. Conclusiones:</p>
          </div>
        </div>
      </div>

      <div class="row space">
        <div class="col-xs-12 data11">

          <p>Se acepta Hp si Tcal <= 2.01</p> <p>Se acepta Hp si x<sup>2</sup>cal <= 2.01</p> <p>Se rechaza Hp si
                x<sup>2</sup>cal > 2.01</p>
          <p>Se acepta Hp si T<sub>2</sub> > F<sub>2</sub> = 2,78</p>

        </div>
      </div>

      <div class="row space">
        <div class="form-control">
          <div class="col-xs-12 data1">
            <p>VIII. Anexos:</p>
          </div>
        </div>
      </div>

      <div class="row space">
        <div class="col-xs-12 data11">
          Estos comentarios fuderon mencionados por los catadores en el desarrollo de la prueba.
          <br />
          <br />
        </div>

      </div>


  
</body>

</html>