<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ChoiceTestSample;
use App\Models\DetailAttributes;
use App\Models\Evaluation;
use Carbon\Carbon;

class PreparationController extends Controller
{
    public function index()
    {
        $samples = Sample::paginate(10);

        foreach ($samples as $index => $sample) {
            $sample->ChoiceTestSample = ChoiceTestSample::where('id_muestra', $sample->id_muestra)->get()->unique('codigo_ortogonal');
        }
    
    //dd($sample->ChoiceTestSample);
        return view('Preparation.index', compact('samples'));
    }

    public function create(Request $request)
    {
        $type = $this->types_permited($request->type);

        $id_type = $this->id_type_sample($request->type);
        $samples = $this->samples($request->preparation);
        $tasters = $this->tasters();
        $orthogonal_code = $request->orthogonal_code;

        
        return view('Preparation.create', compact('tasters'))
            ->with([
                'type' => $type,
                'id_type_sample' => $id_type,
                'id_muestra' => $request->preparation,
                'orthogonal_code' => $request->orthogonal_code

            ]);
    }

    //Registro de eleccion_prueba_muestra
    public function store(Request $request)
    {
        try {
            if($request->id_tipo_prueba == 1){
                $choiceTests  = ChoiceTestSample::where([
                'id_muestra' => $request->id_muestra,
                'id_tipo_prueba' => $request->id_tipo_prueba,
                'codigo_ortogonal' => $request->orthogonal_code
                ])->get(); 
            }else{
                 $choiceTests  = ChoiceTestSample::where([
                'id_muestra' => $request->id_muestra,
                'id_tipo_prueba' => $request->id_tipo_prueba
                ])->get();
            }
           
            
            
            foreach($choiceTests as $choiceTest){
            
                $sample = Sample::find($choiceTest->id_muestra);
    
                $choiceTest->nro_jueces = $request->get('id_tipo_prueba') == 3 ? $request->get('nro_jueces') : count($request->get('catadores_selected'));
                $choiceTest->fecha_inicio = Carbon::parse($request->evaluation_start_date)->format('Y-m-d H:m:s');
                $choiceTest->fecha_fin = Carbon::parse($request->evaluation_end_date)->format('Y-m-d H:m:s');
                $choiceTest->nro_ensayos_muestras = $request->get('number_of_trials');
                $choiceTest->nivel_significacion = $request->get('level_signification'); 
                $choiceTest->nro_repeticiones = $request->get('number_of_repeats');
                $choiceTest->nro_atributos = $request->get('number_of_atributes');
                $choiceTest->estado = "ASIGNADA";
                $choiceTest->save();
                
                //Cambiar estado de la muestra por las pruebas y el estado del modelo ortogonal
                $choiceTestSample       = ChoiceTestSample::where(['id_muestra' => $choiceTest->id_muestra, 'estado' => "ASIGNADA"])->get();
                $choiceTestSample_count = ChoiceTestSample::select('id_muestra')->where('id_muestra', $choiceTest->id_muestra)->get();
                
                if (count($choiceTestSample_count) == count($choiceTestSample) &&  $sample->estado_modelos == 2) {
                    
                   $sample->estado_muestra         = "ASIGNADA";
                   $sample->save();
                    
                }
    
                /* Todas las pruebas excepto Dúo Trío */
                if ($request->get('id_tipo_prueba')  != 1) {
                    foreach ($request->get('attribute') as $attribute) {
                        $detailAttributes = new DetailAttributes();
                        $detailAttributes->id_eleccion_prueba_muestra = $choiceTest->id_eleccion_prueba_muestra;
                        $detailAttributes->nombre_atributo = $attribute;
                        $detailAttributes->save();
                    }
                }
    
                /*Todas excepto la prueba de perfil de consumidores*/
                if ($request->get('id_tipo_prueba')  != 3) {
                    foreach ($request->get('catadores_selected') as $jueces) {
                        $evaluation = new Evaluation();
                        $evaluation->id_catador =  $jueces;
                        $evaluation->id_eleccion_prueba_muestra = $choiceTest->id_eleccion_prueba_muestra;
                        $evaluation->estado = 0;
                        $evaluation->fecha_inicio = $request->evaluation_start_date;
                        $evaluation->fecha_fin = $request->evaluation_end_date;
                        $evaluation->save();
                    }
                } else {
                    //El id_catador es fijo para las pruebas Perfil de consumidores
                    $evaluation = new Evaluation();
                    $evaluation->id_catador =  9;
                    $evaluation->id_eleccion_prueba_muestra = $choiceTest->id_eleccion_prueba_muestra;
                    $evaluation->estado = 0;
                    $evaluation->fecha_inicio = $request->evaluation_start_date;
                    $evaluation->fecha_fin = $request->evaluation_end_date;
                    $evaluation->save();
                }
             
            }
            
            if ($request->get('id_tipo_prueba')  == 1) {

                return redirect()->route('duotrio.index')->with(['id_eleccion_prueba_muestra' => $choiceTest->id_eleccion_prueba_muestra]);
                
            }else if ($request->get('id_tipo_prueba')  == 2){
                $sample->estado_qda         = 1;
                $sample->save();
                return $this->success_message('preparation.index', 'creó');
            }else{
                $sample->estado_PC         = 1;
                $sample->save();
                return $this->success_message('preparation.index', 'creó');
            }
       
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

    public function types_permited($type)
    {
        $types = ['Duo-Trio', 'QDA', 'Perfil de consumidores'];

        return in_array($type, $types) ? $type : abort(404);
    }

    public function id_type_sample($type)
    {
        $types = ['Duo-Trio', 'QDA', 'Perfil de consumidores'];

        return array_search($type, $types) + 1;
    }

    public function tasters()
    {
        return User::where('id_roles' ,2)->where('id_usuario', '<>', 9)->Orderby('id_usuario', 'asc')->get(['id_usuario', 'nombres', 'apellidos']);
    }

    public function samples($id)
    {
        return Sample::findOrFail($id);
    }
}
