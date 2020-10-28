<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use Illuminate\Http\Request;
use App\Models\ChoiceTestSample;
use App\Models\DetailAttributes;
use App\Models\Evaluation;


class PreparationController extends Controller
{
    public function index()
    {
        $samples = Sample::paginate(10);
        foreach($samples as $index => $sample){
           $sample->ChoiceTestSample = ChoiceTestSample::select('id_tipo_prueba')->where('id_muestra',$sample->id_muestra)->get();
        }

        return view('Preparation.index', compact('samples'));
    }

    public function create(Request $request)
    {
        $type = $request->type;
        return view('Preparation.create', compact('type'));
    }
  
    //Registro de eleccion_prueba_muestra
    public function store(Request $request)
    {
        try {
        
            $choiceTest  = ChoiceTestSample::where('id_muestra', $request->get('id_muestra'))
                           ->where('id_tipo_prueba', $request->get('id_tipo_prueba'))->first();
                                      
        	$choiceTest->nro_jueces             = count($request->get('jueces'));
        	$choiceTest->fecha_inicio           = $request->get('evaluation_start_date');
        	$choiceTest->fecha_fin              = $request->get('evaluation_end_date');
        	$choiceTest->nro_ensayos_muestras   = $request->get('number_of_trials');
        	$choiceTest->nivel_significacion    = $request->get('level_signification');
        	$choiceTest->nro_repeticiones       = $request->get('number_of_repeats');
        	$choiceTest->nro_atributos          = $request->get('number_of_atributes');
        	$choiceTest->pdf_resultados         = $request->get('pdf_results');
        	$choiceTest->estado                 = "ASIGNADA";
            $choiceTest->save(); 
            
                foreach ($request->get('attribute') as $attribute) {
                  $detailAttributes = new DetailAttributes();
                  $detailAttributes->id_eleccion_prueba_muestra   =  $choiceTest->id_eleccion_prueba_muestra;
                  $detailAttributes->nombre_atributo              =  $attribute;
                  $detailAttributes->save(); 
                }
                
                foreach ($request->get('jueces') as $jueces) {
                  $evaluation = new Evaluation();
                  $evaluation->id_catador                    =  $jueces;
                  $evaluation->id_eleccion_prueba_muestra    =  $choiceTest->id_eleccion_prueba_muestra;;
                  $evaluation->estado                        =  0;
                  $evaluation->fecha_inicio                  =  $request->get('evaluation_start_date');
                  $evaluation->fecha_fin                     =  $request->get('evaluation_end_date');
    
                  $evaluation->save(); 
                }
            
            return $this->success_message('preparation.index', 'creó');
            
        } catch (\Exception $e) {
            return $this->error_message();
        }
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
