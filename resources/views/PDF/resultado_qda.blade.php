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
    
.radar-chart .level {
  stroke: grey;
  stroke-width: 0.5;
}

.radar-chart .axis line {
  stroke: grey;
  stroke-width: 1;
}
.radar-chart .axis .legend {
  font-family: times-new-roman-font !important;
  font-size: 13px;
}
.point-value {
  font-size: 13px;
  font-family: times-new-roman-font !important;
}
.radar-chart .axis .legend.top {
  dy:1em;
}
.radar-chart .axis .legend.left {
  text-anchor: start;
}
.radar-chart .axis .legend.middle {
  text-anchor: middle;
}
.radar-chart .axis .legend.right {
  text-anchor: end;
}

.radar-chart .tooltip {
  font-family: "times new roman";
  font-size: 13px;
  transition: opacity 200ms;
  opacity: 0;
}
.radar-chart .tooltip.visible {
  opacity: 1;
}

/* area transition when hovering */
.radar-chart .area {
  stroke-width: 2;
  fill-opacity: 0.5;
}
.radar-chart.focus .area {
  fill-opacity: 0.1;
}
.radar-chart.focus .area.focused {
  fill-opacity: 0.7;
}

.radar-chart .circle {
  fill-opacity: 0.9;
}

/* transitions */
.radar-chart .area, .radar-chart .circle {
  transition: opacity 300ms, fill-opacity 200ms;
  opacity: 1;
}
.radar-chart .d3-enter, .radar-chart .d3-exit {
  opacity: 0;
}
    </style>
    <script src="{{asset('js/d3.v3.js')}}"></script>
    <script src="{{asset('js/radar-chart.js')}}"></script>
   
<script>
          RadarChart.defaultConfig.color = function() {};
          RadarChart.defaultConfig.radius = 2;
          RadarChart.defaultConfig.w = 350;
          RadarChart.defaultConfig.h = 350;

        
    </script>
</head>

<body class='body-custom'>
  
  <script>
      const data_js = <?php echo json_encode($data_general); ?>;
      const data_js_inicial = <?php echo json_encode($data_general_inicial); ?>;
      
      function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
          color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
      }
     </script>
  
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
                        <td>{{$choiceTest->Sample->id_muestra}}</td>
                        <td><strong>Fecha:</strong></td>
                        <td>{{\Carbon\Carbon::parse($choiceTest->Sample->fecha_registro)->format('d-m-Y')}}</td>
                    </tr>
                    <tr>
                        <td><strong>Tipo de prueba:</strong></td>
                        <td>QDA</td>
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


    <div class="row space">
        <div class="form-control">
            <div class="col-xs-12 data1">
                <p>I. Promedios y desviación estándar:</p>
            </div>
        </div>
    </div>


    <div class="header-pdf" style="padding: 15px !important;">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <tr>
                        <td colspan=1 style="font-weight: bold;">DESCRIPTOR</td>
                        <td colspan={{$choiceTest->nro_jueces + 2}} style="font-weight: bold;">CATADORES</td>
                    </tr>

                    <tr style="font-weight: bold;">
                        <td>{{""}}</td>
                        @for ($i = 0; $i < $choiceTest->nro_jueces; $i++)
                            <td>{{$i+1}}</td>
                            @endfor
                            <td>{{"x̄"}}</td>
                            <td>{{"D.S"}}</td>
                    </tr>

                    @foreach($detailAttributes as $element=>$da)
                    <tr>
                        <td colspan="1">{{$da->nombre_atributo}}</td>
                        @foreach($evaluation as $index=>$eval)

                        <td colspan="1">{{$resultadosQda[$da->id_detalle_atributos][$eval->id_catador]}}</td>
                        @endforeach
                        <td colspan="1">{{$sumatoria[$da->id_detalle_atributos]}}</td>
                        <td colspan="1">{{$desviacion_estandar[$da->id_detalle_atributos]}}</td>
                    </tr>
                    @endforeach

                </table>
            </div>

        </div>
    </div>


    <div class="row space">
        <div class="form-control">
            <div class="col-xs-12 data1">
                <p>II. Ángulos de separación por cada pares de desciptores:</p>
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
                <p>III. Gráfica de promedios por descriptor:</p>
            </div>
        </div>
    </div>
    <br>
    <div class="contenedor">
        <div class="chart-container"></div>
    </div>

    <script>
        var color = getRandomColor();
          var name = '.chart-container';
          var data = [
            data_js_inicial[0],
            data_js[0]
          ];
          RadarChart.draw(name, data);
          document.getElementsByClassName("grafica-inicial")[0].setAttribute("style","fill: #E6E6E6 !important; opacity: .5;");
          document.getElementsByClassName("circle-group grafica-inicial")[0].setAttribute("style","opacity: .4");
          
          document.getElementsByClassName("grafica-promedio")[0].setAttribute("style","fill:"+ color +"!important; ");

    </script>


</body>

</html>