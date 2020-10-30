<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnswerDuoTrio;

class DuoTrioController extends Controller
{
   
    public function index()
    {
        return view('Preparation.AnswerDuoTrio.create');
    }

    
    public function create(Request $request)
    {
        //
    }

   
    public function store(Request $request)
    {
         try
            {
                
                //dd($request->get('ensayo_id')[0][0]);
                for ($i = 0; $i < 5; $i++){
                    for ($j = 0; $j < 4; $j++){
                        
                        $answerDuoTrio = new AnswerDuoTrio();
                    	$answerDuoTrio->id_eleccion_prueba_muestra	  = 22;
                    	$answerDuoTrio->muestra                       = $request->get('ensayo_id')[$i][$j];
                    	$answerDuoTrio->repeticion                    = $i + 1 ;
                    	$answerDuoTrio->alternativa_uno               = $request->get('muestra1_valores')[$i][$j];
                    	$answerDuoTrio->alternativa_dos               = $request->get('muestra2_valores')[$i][$j];
                    	$answerDuoTrio->respuesta                     = $request->get('igual_p')[$i][$j];
        		        $answerDuoTrio->save();
                    }
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
