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
use PDF;

class EvaluationController extends Controller
{

    public function index()
    {
        $evaluation  = Evaluation::where('id_catador', /* auth()->user()->id_usuario */ 2)->where('estado', 1)->get();
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
        
        if ($type == "Perfil de consumidores"){
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
            $answerDuoTrio = AnswerDuoTrio::where('id_eleccion_prueba_muestra', $request->id_eleccion)->get();

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
                $duoTrioResult->id_evaluacion   = $request->id_evaluacion;
                $duoTrioResult->nro_aciertos    = $contador_aciertos;
                $duoTrioResult->nro_no_aciertos = $contador_no_aciertos;
                $duoTrioResult->comentario      = $request->comentary[$r];
                $duoTrioResult->repeticion      = $r;

                $duoTrioResult->save();
            }

            $update_evaluation = Evaluation::find($request->id_evaluacion);
            $update_evaluation->estado = 2;
            $update_evaluation->save();
            $this->evaluateChoiceTest($request->id_eleccion);
            return $this->success_message('evaluation.index', 'creó');
        } catch (\Exception $e) {
            return $this->error_message();
        }
    }

    //Store de la prueba Perfil de Consumidores
    public function storePC(Request $request)
    {
        try {
            $consumerProfileResults =  new ConsumerProfileResults();
            $consumerProfileResults->id_evaluacion   = $request->get('id_evaluacion');
            $consumerProfileResults->respuesta       = $request->get('respuesta');
            $consumerProfileResults->save();


            $update_evaluation  =  Evaluation::find($request->get('id_evaluacion'));
            $update_evaluation->contador_pc = $update_evaluation->contador_pc + 1;
            $update_evaluation->save();

            if ($update_evaluation->ChoiceTestSample->nro_jueces == $update_evaluation->contador_pc) {
                $this->evaluateChoiceTest($update_evaluation->id_eleccion_prueba_muestra);
            }

            return $this->success_message('evaluation.index', 'creó');
        } catch (\Exception $e) {
            return $this->error_message();
        }
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

            return $this->success_message('evaluation.index', 'creó');
        } catch (\Exception $e) {
            return $this->error_message();
        }
    }

    public function evaluateChoiceTest($id_eleccion_prueba_muestra)
    {
        $choiceTest = ChoiceTestSample::find($id_eleccion_prueba_muestra);
        $evaluation = Evaluation::where(['id_eleccion_prueba_muestra' => $id_eleccion_prueba_muestra, 'estado' => 2])->get();
        date_default_timezone_set('America/Lima');

        if ($choiceTest->id_tipo_prueba == 3) {
            $nombrepdf = "Resultado_PerfilDeConsumidores_" . date("Y") . date("m") . date("d") . '_' . (date('H')) . date('i') . date('s');
            PDF::loadView('PDF.resultado_perfil-consumidores')->save(public_path() . '/pdf/' . $nombrepdf . '.pdf');

            $choiceTest->pdf_resultados = $nombrepdf;
            $choiceTest->estado         = "EJECUTADA";
            $choiceTest->save();
        }


        if ($choiceTest->nro_jueces == count($evaluation)) {

            if ($choiceTest->id_tipo_prueba == 1) {

                $nombrepdf = "Resultado_Duo-Trio_" . date("Y") . date("m") . date("d") . '_' . (date('H')) . date('i') . date('s');
                PDF::loadView('PDF.resultado_duo_trio')->save(public_path() . '/pdf/' . $nombrepdf . '.pdf');
            } elseif ($choiceTest->id_tipo_prueba == 2) {

                $nombrepdf = "Resultado_QDA_" . date("Y") . date("m") . date("d") . '_' . (date('H')) . date('i') . date('s');
                PDF::loadView('PDF.resultado_qda')->save(public_path() . '/pdf/' . $nombrepdf . '.pdf');
            }

            $choiceTest->pdf_resultados = $nombrepdf;
            $choiceTest->estado         = "EJECUTADA";
            $choiceTest->save();
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
        $types = ['Duo-Trio', 'QDA', 'Perfil de consumidores'];
        return in_array($type, $types) ? $type : abort(404);
    }
}
