<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sample;
use App\Models\ChoiceTestSample;

class PreparationController extends Controller
{
    public function index()
    {
        $listSample = Sample::paginate(10);

        return view('Preparation.index', compact('listSample'));
    }

    public function create()
    {
    }

    //Registro de eleccion_prueba_muestra
    public function store(Request $request)
    {
        
        $choiceTest  = ChoiceTestSample::where('id_muestra', $request->get('id_muestra'))
                       ->where('id_tipo_prueba', $request->get('id_tipo_prueba'))->first();
                                  
    	$choiceTest->nro_jueces             = $request->get('nro_jueces');
    	$choiceTest->fecha_inicio           = $request->get('evaluation_start_date');
    	$choiceTest->fecha_fin              = $request->get('evaluation_end_date');
    	$choiceTest->nro_ensayos_muestras   = $request->get('number_of_trials');
    	$choiceTest->nivel_significacion    = $request->get('level_signification');
    	$choiceTest->nro_repeticiones       = $request->get('number_of_repeats');
    	$choiceTest->nro_atributos          = $request->get('number_of_atributes');
    	$choiceTest->pdf_resultados         = $request->get('pdf_results');
    	$choiceTest->estado                 = "ASIGNADA";

    	
        $choiceTest->save();  
   
    }


    public function show($tipo_prueba,$id_muestra)
    {
       return view('Preparation.create',compact('tipo_prueba','id_muestra'));

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
