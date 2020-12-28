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
        
           .line { fill: none; 
          stroke: steelblue;
  stroke-width: 3px;}	
    </style>
      <script src="{{asset('js/d3.v3.js')}}"></script>
        <script src="{{asset('js/d3-line-chart.js')}}"></script>
</head>
<body class='body-custom'>
    <script>
      const data_js = <?php echo json_encode($datos_graficos_generales); ?>;

     </script>

  <div class="header-pdf" style="padding: 15px !important;">
        <h1 class="h2-titulo"> RESULTADO DEL ANÁLISIS - Nº {{$choiceTest->id_eleccion_prueba_muestra}}</h1>
        <div class="row">

            <div class="col-12">
                <table class="table">
                    <tr>
                        <td colspan="4" class="border-fondo">INFORMACIÓN DE LA PRUEBA</td>
                    </tr>
                    <tr>
                        <td><strong>Código:</strong></td>
                        <td>{{$choiceTest->Sample->id_muestra}}</td>
                        <td><strong>Fecha:</strong></td>
                        <td>{{\Carbon\Carbon::parse($choiceTest->Sample->fecha_registro)->format('d-m-Y')}}</td>
                    </tr>
                    <tr>
                        <td><strong>Tipo de prueba:</strong></td>
                        <td>Perfil de consumidores</td>
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
            <p>I. Resultados de la prueba:</p>
          </div>
        </div>
      </div>
      <div class="row space">
        <div class="col-xs-12 data11">

          <p>1.1. Grafico lineal : Esta muestra fue evaluada por {{$choiceTest->nro_jueces}} jueces, de los cuales se calculó el promedio de los resultados. Dichos promedios se representa en el siguiente gráfico :</p>
        <br>
         <div id="multiple">
      	</div>
        <br>

        </div>
      </div>
      
      <div class="row space">
        <div class="form-control">
          <div class="col-xs-12 data1">
            <p>II. Conclusiones de la prueba:</p>
          </div>
        </div>
      </div>
      <div class="row space">
        <div class="col-xs-12 data11">
          <p>Se llegó a la conclusión que la muestra obtuvo un promedio de 9.6 puntos de aprobación por parte de los usuarios participantes.</p>
        </div>
      </div>
   

   	<script type="text/javascript">

        	lc = new LineChart({
        		parent: '#multiple',
        		all_series:data_js,
        		x_axis_text : "Índice",
	        	y_axis_text : "Valor"

        	});
        	lc.plot();
        
        </script>
</body>

</html>