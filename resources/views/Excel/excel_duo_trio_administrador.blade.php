<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <div class="header-pdf" style="padding: 15px !important;">
        <div class="row">
            <div class="col-12">

                <table class="table">
                    <thead>
                        <tr>
                            <td colspan="8"
                                style="vertical-align: middle; height:30px;font-weight: bold;font-size: 15px !important; text-transform: uppercase;  text-align: center; background-color: #45B32D;">
                                Respuestas de la prueba Dúo - Trío
                            </td>

                        </tr>

                        <tr>
                            <td colspan="8">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2"
                                style="font-weight: bold;padding: 30px !important;font-size: 12px !important;text-align: left; ">
                                Código de la muestra
                            </td>
                            <td colspan="6" style="text-align: center;"> {{$choiceTestSample->id_muestra}}-{{$choiceTestSample->codigo_ortogonal}}
                            </td>

                        </tr>
                        <tr>
                            <td colspan="2"
                                style="font-weight: bold;padding: 30px !important;font-size: 12px !important;  text-align: left; ">
                                Tipo de muestra
                            </td>
                            <td colspan="6" style="text-align: center;"> Dúo - Trío
                            </td>

                        </tr>
                        <tr>
                            <td colspan="2"
                                style="font-weight: bold;padding: 30px !important;font-size: 12px !important; text-align: left; ">
                                Encargado
                            </td>
                            <td colspan="6" style="text-align: center;"> {{$choiceTestSample->Sample->responsable}}
                            </td>

                        </tr>

                        <tr>
                            <td colspan="8">
                            </td>
                        </tr>


                    </thead>

                    <tbody>
                      
                        //NUMERO DE REPETICIONES
                        @for($nRepeticion = 0; $nRepeticion < $choiceTestSample->nro_repeticiones; $nRepeticion++) <tr>
                            </tr>

                            <tr>
                                <td rowspan="1" colspan="2"
                                    style="padding: 5px; font-size: 13px !important; width: 10px; text-align: center; ">
                                    <p>Repetición N° {{$nRepeticion+ 1}}</p>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                            <tr>
                                <td colspan="1" rowspan="1"
                                    style="padding: 5px; font-weight: bold;font-size: 12px !important; text-transform: uppercase; border: 5px solid #878783; text-align: center; background-color: #45B32D">
                                    Ensayo
                                </td>
                                <td rowspan="1"
                                    style="padding: 5px; font-weight: bold;font-size: 12px !important; text-transform: uppercase; border: 5px solid #878783; text-align: center; background-color: #45B32D">
                                    Muestras
                                </td>
                                <td colspan="1" rowspan="1"
                                    style="padding: 5px; font-weight: bold;font-size: 12px !important; text-transform: uppercase; border: 5px solid #878783; text-align: center; background-color: #45B32D">
                                    Igual a P
                                </td>
                            </tr>

                            //NUMERO DE MUESTRAS
                            @for($nmuestras = 0; $nmuestras < $choiceTestSample->nro_ensayos_muestras; $nmuestras++) <tr>

                                <td rowspan="1"
                                    style=" font-size: 10px !important; width: 10px; text-align: center; border: 5px solid #878783; background-color: #EFEDEC">
                                    <p>{{$nmuestras+1}}</p>
                                </td>

                                <td rowspan="1" colspan="1"
                                    style=" font-size: 10px !important; width: 18px; text-align: center; border: 5px solid #878783;">
                                    <p>{{$muestra1_valores[$nRepeticion][$nmuestras]}} - {{$muestra2_valores[$nRepeticion][$nmuestras]}}</p>

                                </td>
                                <td rowspan="1"
                                    style=" font-size: 10px !important; width: 15px; text-align: center; border: 5px solid #878783;">
                                    <p>{{$igual_p[$nRepeticion][$nmuestras]}}</p>

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