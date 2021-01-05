<!DOCTYPE html>
<html>

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
            height: 30px;
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

<body>

    <div class="header-pdf" style="padding: 15px !important;">
        <h1 class="h2-titulo"> RESULTADO DEL ANÁLISIS - Nº {{$choiceTest->id_eleccion_prueba_muestra}}</h1>
        <div class="row">

              <div class="col-12">
                <table class="table">
                    <tr>
                        <td colspan="4" class="border-fondo">INFORMACIÓN DE LA PRUEBA </td>
                    </tr>
                    <tr>
                        <td><strong>Código:</strong></td>
                        <td>{{$choiceTest->Sample->id_muestra}}-{{$choiceTest->codigo_ortogonal}}</td>
                        <td><strong>Fecha:</strong></td>
                        <td>{{\Carbon\Carbon::parse($choiceTest->Sample->fecha_registro)->format('d-m-Y')}}</td>
                    </tr>
                    <tr>
                        <td><strong>Tipo de prueba:</strong></td>
                        <td>Dúo - Trío</td>
                        <td><strong>Hora:</strong></td>
                        <td>{{\Carbon\Carbon::parse($choiceTest->Sample->fecha_registro)->format('H:m a')}}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="border-fondo">INFORMACIÓN DE LA MUESTRA </td>

                    </tr>
                    <tr>
                        <td><strong>Nombre de muestra:</strong></td>
                        <td>{{$choiceTest->Sample->nombre_muestra}}</td>
                        <td><strong>Variedad:</strong></td>
                        <td>{{$choiceTest->Sample->variedad}}</td>
                    </tr>
                    <tr>
                        <td><strong>Procedencia:</strong></td>
                        <td>{{$choiceTest->Sample->procedencia}}</td>
                        <td><strong>Humedad:</strong></td>
                        <td>{{$choiceTest->Sample->humedad}}</td>
                    </tr>
                    <tr>
                        <td><strong>Tamaño de grano:</strong></td>
                        <td>{{$choiceTest->Sample->tamanio_grano}}</td>
                        <td><strong>Responsable:</strong></td>
                        <td>{{$choiceTest->Sample->responsable}}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="border-fondo">MODELO ORTOGONAL</td>

                    </tr>
                </table>
            </div>

        </div>
    </div>
   
    <br />
    <br />

     <div class="row space">
        <div class="form-control">
            <div class="col-xs-12 data1">
                <p>I. Planteamiento de la Hipótesis:</p>
            </div>
        </div>
    </div>
    <div class="row space">
        <div class="col-xs-12 data11 ">

            <p>Hp: Las k muestras relacionadas han sido extraídas de poblaciones idénticas o todos los tratamientos tienen idénticos efectos.</p>
            <p>Ha: Las k muestras relacionadas no han sido extraídas de poblaciones idénticas o no todos los tratamientos tienen idénticos efectos.</p>


        </div>
    </div>
    <div class="row space">
        <div class="form-control">
            <div class="col-xs-12 data1 ">
                <p>II. Elección del nivel de significación ( α ):</p>
            </div>
        </div>
    </div>
    <div class="row space">
        <div class="col-xs-12 data11">
            <p>El nivel de significación asignado para esta prueba es: <b>{{$choiceTest->nivel_significacion}}</b>.</p>
        </div>
    </div>
    <div class="row space">
        <div class="form-control">
            <div class="col-xs-12 data1 ">
                <p>III. Tipo de prueba de la hipótesis:</p>
            </div>
        </div>
    </div>
    <div class="row space">
        <div class="col-xs-12 data11">
            <p>El tipo de prueba es Dúo - Trío</p>

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
            <p>Los datos siguen una distribución estadística .</p>
            <p>Las muestras son elegidas aleatoriamente (al azar).</p>
        </div>
    </div>



    <div class="row space">
        <div class="form-control">
            <div class="col-xs-12 data1">
                <p>V. Criterios de decisión:</p>
            </div>
        </div>
    </div>
    <div class="row space">
        <div class="col-xs-12 data11">

           <p>Se acepta Hp si X<sup>2</sup>cal <= X<sup>2</sup>tab (1-α, n -1) </p>
           <p>Se rechaza Hp si X<sup>2</sup>cal > X<sup>2</sup>tab</p>

        </div>
    </div>
    
    
    <br />
    <br />
    <br />

 <br />
    <br />
    <div class="row space">
        <div class="form-control">
            <div class="col-xs-12 data1 ">
                <p>VI. Desarrollo de la prueba estadística:</p>
            </div>
        </div>
    </div>
    <div class="row space">
        <div class="col-xs-12 data11">
            
            <div class="row">

              <div class="col-12">
                <table class="table">
                    
                    <tr>
                        <td>Número de respuestas acertadas(X)</td>
                        <td><strong>{{$X = $numero_acertadas}}</strong></td>
                        <td>Número de repeticiones(r)</strong></td>
                        <td><strong>{{$r = $choiceTest->nro_repeticiones}}</strong></td>
                    </tr>
                    <tr>
                        <td>Número de muestras(m):</td>
                        <td><strong>{{$m = $choiceTest->nro_ensayos_muestras}}</strong></td>
                        <td>Número de jueces(j):</td>
                        <td><strong>{{$j = $choiceTest->nro_jueces}}</strong></td>
                    </tr>
                     <tr>
                        <td>Nivel de significación ( α ):</td>
                        <td><strong>{{$ns = $choiceTest->nivel_significacion}}</strong></td>
                        <td>Probabilidad de ocurrencia ( p ):</td>
                        <td><strong>{{ $p = (float) "0.5" }}</td>
                    </tr>
                    
                    <tr>
                        <td>Probabilidad de no ocurrencia ( q ):</td>
                        <td><strong>{{ $q = (float) "0.5" }}</strong></td>
                        <td>Número de pruebas realizadas totales ( n ):</td>
                        <td><strong>{{ $n = $r * $m * $j }}</strong></td>
                    </tr>
                    <tr>
                        <td>Probabilidad de no ocurrencia ( q ): </td>
                        <td><strong>{{ $q = (float) "0.5" }}</strong></td>
                        <td>Número de pruebas realizadas totales ( n ):</td>
                        <td><strong>{{ $n = $r * $m * $j }}</strong></td>
                    </tr>
                     <tr>
                        <td>Número de respuestas no acertadas ( X2 ): </td>
                        <td><strong>{{ $X2 = $n - $X }}</strong></td>
                        <td> Numero de opciones ( k ):</td>
                        <td><strong>{{ $k = 2 }}</strong></td>
                     </tr>
                     <tr>
                        <td>Grados de Libertad ( k - 1 ):</td>
                        <td><strong>{{ $k - 1 }}</strong></td>
                        <td> Valores esperados (ei):</td>
                        <td><strong>{{ $e_i = $n * 0.5 }}</strong></td>
                     </tr>
                     <tr>
                        <td>Número de respuestas no acertadas ( X2 ):</td>
                        <td><strong>{{ $X2 = $n - $X }}</strong></td>
                        <td> Numero de opciones ( k ):</td>
                        <td><strong>{{ $k = 2 }}</strong></td>
                     </tr>
                     <tr>
                        <td>Grados de Libertad ( k - 1 ):  </td>
                        <td><strong>{{ $k - 1 }}</strong></td>
                        <td> Valores esperados (ei):</td>
                        <td><strong>{{ $e_i = $n * 0.5 }}</strong></td>
                     </tr>
                   
                </table>
            </div>

        </div>
            
      
         
            <br>
            <p> Oi = O1 = <b>{{ $O1 = $X }} </b>(Hay diferencia)</p>
            <p> Oi = O2 =  <b>{{ $O2 = $X2 }} </b>(No hay diferencia)</p>
            
            <br>
            <p> Cálculo del valor de 'x<sup>2</sup>' tab:  <b> {{ $Ttab = $x_tabular }}</b></p>
            <p> Cálculo del valor de 'X<sup>2</sup>' cal:  <b> {{$Tcal = round( pow( ( ($O1 - $e_i) - 0.5 ), 2 ) / $e_i + pow( ( ($O2 - $e_i) - 0.5 ), 2 ) / $e_i, 2 ) }} </b></p>
            <br>
            <p> Donde:</p>
            <p> n = Número total de ensayos</p>
            <p> Pi = Probabilidad de ocurrencia del evento (valor asignado: 0.5)</p>
            <p> Oi = Valores Observados</p>

        </div>
    </div>
   


    <div class="row space">
        <div class="form-control">
            <div class="col-xs-12 data1 ">
                <p>VII. Conclusiones:</p>
            </div>
        </div>
    </div>

    <div class="row space">
        <div class="col-xs-12 data11">

            @if($Tcal <= $Ttab)
               <p>Se acepta Hp si x<sup>2</sup>cal <= {{$Ttab}}</p>
            @else
                <p>Se rechaza Hp si x<sup>2</sup>cal > {{$Ttab}}</p>
            @endif

        </div>
    </div>

    </div>

    </div>

</body>

</html>