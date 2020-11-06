<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sample;
use App\Models\ChoiceTestSample;
use App\Models\SampleStudyParameters;
use Carbon\Carbon;

class TestsController extends Controller
{
    public function manage()
    {
        return view('Tests.manage')->with([]);
    }
    //--- SECCION LIST SAMPLE ---//
    public function index()
    {
        $listSample = Sample::OrderBy('fecha_registro', 'asc')->paginate(10);

        return view('Tests.index', compact('listSample'));
    }

    //--- SECCION CREATE SAMPLE ---//
    public function create()
    {
        return view('Tests.create')->with([]);
    }

    public function store(Request $request)
    {
       /*  try { */
            $codigo = $this->randomString();

            $dateActual = Carbon::now()->format('Y-m-d H:i:s');

            $sample = new Sample();

            $sample->id_muestra               =  $codigo;
            $sample->nombre_muestra           =  $request->get('sample_name');
            $sample->variedad                 =  $request->get('variety');
            $sample->procedencia              =  $request->get('origin');
            $sample->humedad                  =  $request->get('humidity');
            $sample->tamanio_grano            =  $request->get('grain_size');
            $sample->responsable              =  $request->get('responsable');
            $sample->id_usuario               =  auth()->user()->id_usuario;
            $sample->nro_parametros_estudio   =  $request->get('study_parameter');
            $sample->nro_modelos_ortogonales  =  $request->get('number_of_models');
            $sample->nro_repeticiones         =  $request->get('number_of_repeats');
            $sample->estado_modelos           =  1;
            $sample->estado_muestra           =  'CREADA';
            $sample->fecha_registro           =  $dateActual;
            $sample->save();

            foreach ($request->check_lista as $check) {
                $choiceTest = new ChoiceTestSample();
                $choiceTest->id_muestra      =  $codigo;
                $choiceTest->id_tipo_prueba  =  $check;
                $choiceTest->estado          =  "CREADA";
                $choiceTest->save();
            }

            foreach ($request->attribute as $attribute) {
                $sampleStudy = new SampleStudyParameters();
                $sampleStudy->id_muestra   =  $codigo;
                $sampleStudy->parametro    =  $attribute;
                $sampleStudy->save();
            }

            return $this->success_message('manageTest', 'creó');
        /* } catch (\Exception $e) {
            return $this->error_message();
        } */
    }

    //--- FIN SECCION CREATE SAMPLE ---//

    //Ver recurso
    public function show(Sample $test)
    {
        return view();
    }

    //Formulario de recurso
    public function edit(Sample $test)
    {
        /* $sample = ChoiceTestSample::where('id_muestra', $test->id_muestra)->get(); */
        return view('Tests.edit', compact('test'));
    }

    //Actualizar recurso
    public function update(Request $request, Sample $test)
    {
        try {
            $test->nombre_muestra           =  $request->get('sample_name');
            $test->variedad                 =  $request->get('variety');
            $test->procedencia              =  $request->get('origin');
            $test->humedad                  =  $request->get('humidity');
            $test->tamanio_grano            =  $request->get('grain_size');
            $test->responsable              =  $request->get('responsable');
            $test->nro_parametros_estudio   =  $request->get('study_parameter');
            $test->nro_modelos_ortogonales  =  $request->get('number_of_models');
            $test->nro_repeticiones         =  $request->get('number_of_repeats');
            $test->save();

            return $this->success_message('test.index', 'actualizó');
        } catch (\Exception $e) {
            return $this->error_message();
        }
    }

    public function destroy(Sample $test)
    {
        try {
            $test->delete();
            return $this->success_message('test.index', 'eliminó');
        } catch (\Exception $e) {
            return $this->error_message();
        }
    }


    function randomString()
    {
        // Seleccionamos el tipo de caracteres que deseas que devuelva el string

        $salt = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $DesdeNumero = 100;
        $HastaNumero = 999;
        $numeroAleatorio = rand($DesdeNumero, $HastaNumero);
        $rand = '';
        $i = 0;
        while ($i < 3) {
            //Loop hasta que el string aleatorio contenga la longitud ingresada.
            $num = rand() % strlen($salt);
            $tmp = substr($salt, $num, 1);
            $rand = $rand . $tmp;
            $i++;
        }
        //Retorno del string aleatorio.
        $codigo = $rand . "" . $numeroAleatorio;
        return $codigo;
    }
}
