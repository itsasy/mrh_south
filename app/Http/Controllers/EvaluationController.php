<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluation;
use App\Models\AnswerDuoTrio;
use App\Models\DuoTrioResult;
use App\Models\DetailAttributes;
use App\Models\AnswerQda;
use App\Models\ChoiceTestSample;
use App\Models\ConsumerProfileResults;
use MathPHP\Probability\Distribution\Table\ChiSquared;
use PDF;
use App\Models\Sample;

class EvaluationController extends Controller
{
    public function index()
    {
        $id_usuario = auth()->user()->id_usuario ?? 9;
        $evaluation  = Evaluation::where('id_catador', $id_usuario)->where('estado', 1)->with('ChoiceTestSample')->get();
       
        //Situar la evaluacion e id_eleccion
        return view('Evaluation.index', compact('evaluation'));
    }

    public function create(Request $request)
    {
        $type = $this->types_permited($request->type);

        if ($type == "QDA") {
            $valores_generales =  $this->create_qda($request->election);
        }
        if ($type == "Duo-Trio") {
            $valores_generales = $this->create_duo_trio($request->election);
        }

        if ($type == "Perfil de consumidores") {
            $valores_generales = DetailAttributes::where('id_eleccion_prueba_muestra', $request->election)->get();
        }

        return view('Evaluation.create', compact('type',  'valores_generales'))->with(
            [
                'id_evaluation' => $request->evaluation,
                'id_eleccion' => $request->election
            ]
        );
    }

    //Store de la prueba Duo Trio
    public function store(Request $request)
    {
        try {
            $answerDuoTrio = AnswerDuoTrio::where('id_eleccion_prueba_muestra', $request->get('id_eleccion'))->get();

            foreach ($answerDuoTrio as $adt) {
                $answer[$adt->repeticion][$adt->muestra] = $adt->respuesta;
            }
            //REGISTRAR POR REPETICIÓN
            for ($r = 1; $r <= $answerDuoTrio[0]->ChoiceTestSample->nro_repeticiones; $r++) {
                $contador_aciertos = 0;
                $contador_no_aciertos = 0;

                for ($e = 1; $e <= $answerDuoTrio[0]->ChoiceTestSample->nro_ensayos_muestras; $e++) {
                    if ($request->get('muestra_valor')[$r][$e] == $answer[$r][$e]) {
                        $contador_aciertos++;
                    } else {
                        $contador_no_aciertos++;
                    }
                }

                $duoTrioResult =  new DuoTrioResult();
                $duoTrioResult->id_evaluacion   = $request->get('id_evaluacion');
                $duoTrioResult->nro_aciertos    = $contador_aciertos;
                $duoTrioResult->nro_no_aciertos = $contador_no_aciertos;
                $duoTrioResult->comentario      = $request->get('comentary')[$r];
                $duoTrioResult->repeticion      = $r;

                $duoTrioResult->save();
            }

            $update_evaluation = Evaluation::find($request->get('id_evaluacion'));
            $update_evaluation->estado = 2;
            $update_evaluation->save();
            
            $this->evaluateChoiceTest($request->get('id_eleccion'));
            
            return $this->success_message('evaluation.index', 'guardaron');
            
        } catch (\Exception $e) {
            return $this->error_message();
        }
    }

    //Store de la prueba Perfil de Consumidores
    public function storePC(Request $request)
    {
        /*  try { */
        foreach ($request->respuesta as $key => $respuesta) {
            $consumerProfileResults =  new ConsumerProfileResults();
            $consumerProfileResults->id_evaluacion = $request->get('id_evaluacion');
            $consumerProfileResults->respuesta = $respuesta;
            $consumerProfileResults->id_detalle_atributos =  $request->get('atributos')[$key];

            $consumerProfileResults->save();
        }

        $update_evaluation = Evaluation::find($request->id_evaluacion);
        
        $update_evaluation->contador_pc = $update_evaluation->contador_pc + 1;
       

        if ($update_evaluation->ChoiceTestSample->nro_jueces == $update_evaluation->contador_pc) {
            $this->evaluateChoiceTest($update_evaluation->id_eleccion_prueba_muestra);
            $update_evaluation->estado = 2;
        }
         $update_evaluation->save();

        return $this->success_message('invited.index', 'guardaron');
        /*  } catch (\Exception $e) {
            return $this->error_message();
        } */
    }

    //Store de la prueba QDA  
    public function storeQDA(Request $request)
    {
        try {
            foreach ($request->id_detail_attributes as $key => $attribute) {
                $answerQda = new AnswerQda();
                $answerQda->id_evaluacion = $request->id_evaluacion;
                $answerQda->id_detalle_atributos = $attribute;
                $answerQda->respuesta = $request->result[$key];
                $answerQda->save();
            }

            $update_evaluation = Evaluation::find($request->id_evaluacion);
            $update_evaluation->estado = 2;
            $update_evaluation->save();

            $this->evaluateChoiceTest($update_evaluation->id_eleccion_prueba_muestra);

            return $this->success_message('evaluation.index', 'guardaron');
        } catch (\Exception $e) {
            return $this->error_message();
        }
    }

    public function evaluateChoiceTest($id_eleccion_prueba_muestra)
    {
        $choiceTest = ChoiceTestSample::find($id_eleccion_prueba_muestra);
        $sample     = Sample::find($choiceTest->id_muestra);

        $evaluation = Evaluation::where(['id_eleccion_prueba_muestra' => $id_eleccion_prueba_muestra, 'estado' => 2])->get();
        date_default_timezone_set('America/Lima');
      
    
        if ($choiceTest->id_tipo_prueba == 3) { //Perfil de consumidores

            $nombrepdf = $this->pdf_perfil_consumidores($choiceTest);

            $choiceTest->pdf_resultados = $nombrepdf;
            $choiceTest->estado         = "EJECUTADA";
            $choiceTest->save();
            
        }else{
            
          if ($choiceTest->nro_jueces == count($evaluation)) {

            if ($choiceTest->id_tipo_prueba == 1) { //Duo Trio

                 $numero_acertadas = 0;
                   foreach($evaluation as $index => $evaluations){
                        $duoTrioResult = DuoTrioResult::where('id_evaluacion', $evaluations->id_evaluacion)->get(); 
                        $numero_acertadas = collect($duoTrioResult)->sum('nro_aciertos') + $numero_acertadas;
                   }
            
                    $p = sprintf('%1.3f', $choiceTest->nivel_significacion);
                    //1 == Grados de libertad  $p = corregir puede que ese no sea el valor
                    $x_tabular = ChiSquared::CHI_SQUARED_SCORES[1][$p];
                   
                    $nombrepdf = "Resultado_Duo-Trio_" .$choiceTest->id_muestra."_". date("Y") . date("m") . date("d") . '_' . (date('H')) . date('i') . date('s'). '.pdf';
                    PDF::loadView('PDF.resultado_duo_trio', compact('choiceTest','numero_acertadas','x_tabular'))->save(public_path() . '/pdf/' . $nombrepdf );
                    
            }elseif ($choiceTest->id_tipo_prueba == 2) { //QDA
              $nombrepdf  =  $this->pdf_qda($choiceTest,$evaluation);
            }

            $choiceTest->pdf_resultados = $nombrepdf;
            $choiceTest->estado         = "EJECUTADA";
            $choiceTest->save();
            }
        }

       
        
          //Cambiar estado de la muestra por las pruebas y el estado del modelo ortogonal
           $choiceTestSample       = ChoiceTestSample::where(['id_muestra' => $choiceTest->id_muestra, 'estado' => "EJECUTADA"])->get();
           $choiceTestSample_count = ChoiceTestSample::select('id_muestra')->where('id_muestra', $choiceTest->id_muestra)->get();
            
            if (count($choiceTestSample_count) == count($choiceTestSample) &&  $sample->estado_modelos == 2) {
                
               $sample->estado_muestra         = "EJECUTADA";
               $sample->save();
                
            }

      //
        
    }
    
    public function pdf_qda($choiceTest,$evaluation){
        
        $data_general = array();
        $data_general_inicial = array();
        
        $detailAttributes = DetailAttributes::where('id_eleccion_prueba_muestra', $choiceTest->id_eleccion_prueba_muestra)->get();        

      //Obtener la sumatoria y desviacion estandar de cada atributo
            foreach($detailAttributes as $atributo => $da){
                
               $suma = 0;
               $resultadoQda = AnswerQda::where('id_detalle_atributos',$da->id_detalle_atributos)->orderByRaw("id_detalle_atributos ASC")->get();    
                
                foreach($resultadoQda as $resultado => $rpta){
                     $resultadosQda[$rpta->id_detalle_atributos][$rpta->Evaluation->id_catador] = $rpta->respuesta;
                     $suma = $rpta->respuesta+$suma;
                     $array_desv_standar[$resultado] = $rpta->respuesta ;

                }
                
                $sumatoria[$da->id_detalle_atributos] = round($suma/$evaluation->count(),2);
                $desviacion_estandar[$da->id_detalle_atributos] = $this->Stand_Desviation($array_desv_standar) ; 
                
                $data[$atributo] = ["axis" => $da->nombre_atributo, "value" => floatval($sumatoria[$da->id_detalle_atributos])];
                $radar_inicial[$atributo] = ["axis" => $da->nombre_atributo, "value" => floatval(10)];

            }
            
              $data = array( "className" => "grafica-promedio" , "axes" => $data);
              $data_inicial = array( "className" => "grafica-inicial" , "axes" => $radar_inicial);

              array_push($data_general, $data);
              array_push($data_general_inicial, $data_inicial);


        $nombrepdf = "Resultado_QDA_" .$choiceTest->id_muestra."_". date("Y") . date("m") . date("d") . '_' . (date('H')) . date('i') . date('s'). '.pdf';
        PDF::loadView('PDF.resultado_qda', compact('choiceTest','detailAttributes','resultadosQda','evaluation','sumatoria','desviacion_estandar','data_general','data_general_inicial'))->save(public_path() . '/pdf/' . $nombrepdf );
   
        return $nombrepdf;
        
    }
    
    function pdf_perfil_consumidores($choiceTest){
     //Verificar si el numero de jueces es par o impar
            $evaluation       = Evaluation::where('id_eleccion_prueba_muestra', $choiceTest->id_eleccion_prueba_muestra)->get(); 
            $detailAttributes = DetailAttributes::where('id_eleccion_prueba_muestra', $choiceTest->id_eleccion_prueba_muestra)->get(); 

        if( $choiceTest->nro_jueces % 5 == 0){
            $valor =   intval($choiceTest->nro_jueces / 5) - 1;  //24.2 => 24
            $tipo  =   "par";
            $valor_nro_jueces = 5;

        }else{
          
            $valor =   intval($choiceTest->nro_jueces / 5);  //24.2 => 24
            $tipo  =   "impar";
            $valor_nro_jueces = $choiceTest->nro_jueces - $valor * 5;   //121-120 = 1
        }
        
        foreach($detailAttributes as $atributo => $da){
            $consumerProfileResults    = ConsumerProfileResults::where(['id_evaluacion' => $evaluation[0]->id_evaluacion, 'id_detalle_atributos' => $da->id_detalle_atributos])->get();

            //Calculo de los promedios
            for($i = 0; $i < ($valor + 1) ; $i++){
                    
               $suma = 0;
               if($i == $valor && $tipo == "impar"){//04  14 24 34 44
                   $num = $valor_nro_jueces ; //5

                   for($j = $i*5  ; $j < $i*5 +$valor_nro_jueces ; $j++){
                   
                      $suma = $suma + $consumerProfileResults[$j]->respuesta;
                   }
               
               }else{
                       $num = 5;
    
                        for($j = $i* $num ; $j < ($i+1) * $num; $j++){
                        
                           $suma = $suma + $consumerProfileResults[$j]->respuesta;
                            
                        }
                    
                    }
               ///4*1
              
              $sumatoria_inicial[$atributo][$i]=round($suma/$num,2); 
            }
            
              //SUMATORIO DE LOS PROMEDIOS
             
                 for ($SP = 0; $SP < count($sumatoria_inicial[$atributo]) ; $SP++) {
                     
                     if($SP == 0) {
                         $sumatoria_promedios[$SP] = $sumatoria_inicial[$atributo][$SP] ;
                     }else{
                         $sumatoria_promedios[$SP] = ($sumatoria_promedios[$SP-1] + $sumatoria_inicial[$atributo][$SP])/2;
                     }
          
                    
                  $sumatoria_promedios_final[$SP]= round($sumatoria_promedios[$SP],2);
                  
                 }

            asort($sumatoria_promedios_final);

            $cont = 0;
            foreach($sumatoria_promedios_final as $in => $SP){
                           
                $sumatoria_promedios_ordenado[$atributo][$cont] = $SP;
                $cont++;
          
          }
          
        }
        
        $datos_graficos_generales = $this->crea_puntos_graficos($sumatoria_promedios_ordenado, $detailAttributes) ; 

        //dd($datos_graficos_generales);
      
        $nombrepdf = "Resultado_PerfilDeConsumidores_" .$choiceTest->id_muestra."_". date("Y") . date("m") . date("d") . '_' . (date('H')) . date('i') . date('s'). '.pdf';
        PDF::loadView('PDF.resultado_perfil-consumidores', compact('choiceTest','datos_graficos_generales'))->save(public_path() . '/pdf/' . $nombrepdf );
        
        return $nombrepdf;
    }
    
    function crea_puntos_graficos($sumatoria_promedios_ordenado , $detailAttributes){
        
           for($i = 0 ; $i <count($sumatoria_promedios_ordenado);$i++){
             for($m = 0 ; $m < count($sumatoria_promedios_ordenado[$i]);$m++){
                $lineal_inicial[$m] = ["x" => ($m+1)*5, "y" => $sumatoria_promedios_ordenado[$i][$m]];
             }
             $lineal_final[$i] = ["name" => $detailAttributes[$i]->nombre_atributo, "values" =>$lineal_inicial];

        }
        return $lineal_final;
  
    }
   
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }


    public function create_qda($id_eleccion)
    {
        return DetailAttributes::where('id_eleccion_prueba_muestra', $id_eleccion)->get();
    }

    public function create_duo_trio($id_eleccion)
    {
        $valores_generales = AnswerDuoTrio::where('id_eleccion_prueba_muestra', $id_eleccion)->get();

        foreach ($valores_generales as $adt) {
            $answer[$adt->repeticion][$adt->muestra] = [
                'alternativa_uno' => $adt->alternativa_uno,
                'alternativa_dos' => $adt->alternativa_dos
            ];
        }

        return ['valores_generales' => $valores_generales,  'answer' => $answer, 'id_elecc' => $id_eleccion];
    }

    public function types_permited($type)
    {
        if (auth()->user() && auth()->user()->id_roles == 2) {
            $types = ['Duo-Trio', 'QDA'];
        }

        if (!auth()->user()) {
            $types = ['Perfil de consumidores'];
        }

        return in_array($type, $types) ? $type : abort(404);
    }
    
    function Stand_Desviation($arr)  { 

       $num_of_elements = count($arr); 
       $variance = 0.0; 
       $average = array_sum($arr)/$num_of_elements; 
       
       foreach($arr as $i) 
       { 
           $variance += pow(($i - $average), 2); 
       } 
       
       return round((float)sqrt($variance/($num_of_elements-1)),3); 
            
    }
}
