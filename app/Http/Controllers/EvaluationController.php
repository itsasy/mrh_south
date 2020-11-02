<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluation;
use App\Models\AnswerDuoTrio;
use App\Models\DuoTrioResult;
use App\Models\DetailAttributes;
use App\Models\AnswerQda;
use App\Models\ChoiceTestSample;


class EvaluationController extends Controller
{
   
    public function index(){
        $evaluation  = Evaluation::where('id_catador', $request->get('id_juez'))->where('estado', 1)->get();
        return view('Evaluation.index',compact('evaluation'));
    }

  
    public function create(Request $request)
    {
         $type      = $request->type;

        if($type == "QDA"){
            
           $valores_generales = DetailAttributes::where('id_eleccion_prueba_muestra', $request->get('id_eleccion_prueba_muestra'))->get();

        }elseif( $type == "Duo-Trio"){
            
           $valores_generales = AnswerDuoTrio::where('id_eleccion_prueba_muestra', $request->get('id_eleccion_prueba_muestra'))->get();

        }else{
            
        }
       
        //dd($answerQda);
        
        return view('Evaluation.create', compact('type','valores_generales'));
    }

    //Store de la prueba Duo Trio
    public function store(Request $request)
    {
       try{
           
          $answerDuoTrio = AnswerDuoTrio::where('id_eleccion_prueba_muestra',$request->get('id_eleccion_prueba_muestra'))->get();
          
          foreach($answerDuoTrio as $adt){
              $answer[$adt->repeticion][$adt->muestra] = $adt->respuesta;
          }
          
          //REGISTRAR POR REPETICIÓN
            for ($r = 0; $r < $answerDuoTrio[0]->ChoiceTestSample->nro_repeticiones; $r++){
                
                $contador_aciertos    = 0; 
                $contador_no_aciertos = 0; 

               for ($e = 0; $e < $answerDuoTrio[0]->ChoiceTestSample->nro_ensayos_muestras; $e++){
                   if($request->get('result')[$r][$e]  =  $answer[$r + 1][$e + 1]){
                       $contador_aciertos++;
                   }else{
                       $contador_no_aciertos++; 
                   }
               }
                 
                  $duoTrioResult =  new DuoTrioResult();
                  $duoTrioResult->id_evaluacion   = $request->get('id_evaluacion'); 
                  $duoTrioResult->nro_aciertos    = $contador_aciertos; 
                  $duoTrioResult->nro_no_aciertos = $contador_no_aciertos; 
                  $duoTrioResult->comentario      = $request->get('comentario')[$r]; 
                  $duoTrioResult->repeticion      = $r; 
                  $duoTrioResult->save();

            }
                 $update_evaluation = Evaluation::find($request->get('id_evaluacion'));
    	         $update_evaluation->estado = 2;
    	         $update_evaluation->save();
             return $this->success_message('evaluation.index', 'creó');

                 
    	         
        }catch (\Exception $e) {
                return $this->error_message();
        }
       
       
    }
    
    //Store de la prueba QDA  
    public function storeQDA(Request $request)
    {
       try{
           for ($r = 0; $r < count($request->get('result')); $r++){
               $answerQda =  new AnswerQda();
               $answerQda->id_evaluacion           = $request->get('id_evaluacion'); 
               $answerQda->id_detalle_atributos    = $request->get('id_detail_attributes')[$r]; 
               $answerQda->respuesta               = $request->get('result')[$r]; 
               $answerQda->save();
           }
              
                $update_evaluation  =  Evaluation::find($request->get('id_evaluacion'));
    	        $update_evaluation->estado = 2;
    	        $update_evaluation->save();
    	        
           return $this->success_message('evaluation.index', 'creó');

        }catch (\Exception $e) {
                return $this->error_message();
        }
       
       
    }

    public function evaluateChoiceTest($id_eleccion_prueba_muestra)
    {
       $choiceTest = ChoiceTestSample::find($id_eleccion_prueba_muestra);
       $evaluation = Evaluation::where([ 'id_eleccion_prueba_muestra' => $id_eleccion_prueba_muestra, 'estado' => 2])->get();
       if($choiceTest->nro_jueces == count($evaluation)){
           //GENERAR PDF USER Y ADMI
       }
     //  dd(count($evaluation));
        
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
}
