<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnswerDuoTrio;
use App\Models\ChoiceTestSample;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Excel\ExcelDuoTrioExport;
use Carbon\Carbon;
use App\Models\Sample;

class DuoTrioController extends Controller
{
    public function index()
    {

        $choiceTestSample =   ChoiceTestSample::where('id_eleccion_prueba_muestra', session('id_eleccion_prueba_muestra'))->first();
        return view('Preparation.AnswerDuoTrio.create', compact('choiceTestSample'));
    }


    public function create(Request $request)
    {
        //
    }


    public function store(Request $request)
    {
        try {

            //dd($request->get('ensayo_id')[0][0]);
            for ($i = 0; $i < $request->get('nro_repeticiones'); $i++) {
                for ($j = 0; $j < $request->get('nro_ensayos_muestras'); $j++) {

                    $answerDuoTrio = new AnswerDuoTrio();
                    $answerDuoTrio->id_eleccion_prueba_muestra      = $request->get('id_eleccion_prueba_muestra');
                    $answerDuoTrio->muestra                       = $request->get('ensayo_id')[$i][$j];
                    $answerDuoTrio->repeticion                    = $i + 1;
                    $answerDuoTrio->alternativa_uno               = $request->get('muestra1_valores')[$i][$j];
                    $answerDuoTrio->alternativa_dos               = $request->get('muestra2_valores')[$i][$j];
                    $answerDuoTrio->respuesta                     = $request->get('igual_p')[$i][$j];
                    $answerDuoTrio->save();
                }
            }


            $choiceTestSample =   ChoiceTestSample::where('id_eleccion_prueba_muestra', $request->get('id_eleccion_prueba_muestra'))->first();
            $fecha = Carbon::now()->format("Ymd_His");
            $filename = 'Excel_Duo_Trio_' . $request->get('id_eleccion_prueba_muestra') . "_" . $fecha . '.xlsx';
            $exc = Excel::store(new ExcelDuoTrioExport(
                $request->get('muestra1_valores'),
                $request->get('muestra2_valores'),
                $request->get('igual_p'),
                $choiceTestSample),  $filename, 'excel');

               $sampleupdate = Sample::find($choiceTestSample->id_muestra);
               $sampleupdate->excel_respuestas_duo_trio = $filename;
               $sampleupdate->save();
               
            return $this->success_message('preparation.index', 'creó');
        } catch (\Exception $e) {
            return $this->error_message();
        }
    }
    
  
    
    public function show($id)
    {
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
