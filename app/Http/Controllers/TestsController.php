<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sample;
use App\Models\ChoiceTestSample;
use App\Models\SampleStudyParameters;
use Illuminate\Support\Facades\Session;

class TestsController extends Controller
{
    public function manage()
    {
        return view('Tests.manage')->with([]);
   
    }
    //--- SECCION LIST SAMPLE ---//
    public function index()
    {
        $listSample = Sample::all();

        return view('Tests.index', compact('listSample'));
    }

    //--- SECCION CREATE SAMPLE ---//
    
    public function create()
    {
        return view('Tests.create')->with([]);
    }

    public function store(Request $request)
    {
       // dd($request->get('nom_muestra'));
        try {
            
            $codigo = $this->randomString();

            date_default_timezone_set('America/Lima');
            $dateActual = date("Y")."-".date("m")."-".date("d")." ".date("H").":".date("i").":".date("s");

            $sample = new Sample();
            
            $sample->id_muestra                    =  $codigo;
            $sample->id_usuario                    =  session('user')->id_usuario;
            $sample->nro_parametros_estudio        =  $request->get('study_parameter');
            $sample->nro_modelos_ortogonales       =  $request->get('number_of_models');
            $sample->nro_repeticiones              =  $request->get('number_of_repeats');
            $sample->estado_modelos                =  1;
            $sample->estado_muestra                =  'ACTIVO';
            $sample->fecha_registro                =  $dateActual;
            $sample->save();
            
            
            for($c = 0 ; $c < count($request->get('check_lista')) ; $c++){
                
                $choiceTest = new ChoiceTestSample();
                $choiceTest->id_muestra      =  $codigo;
                $choiceTest->id_tipo_prueba  =  $request->get('check_lista')[$c];
                $choiceTest->estado          =  "CREADA";

                $choiceTest->save();

            }
            
            for($s = 0 ; $s < count($request->get('nom_muestra')) ; $s++){
                
                $sampleStudy = new SampleStudyParameters();
                $sampleStudy->id_muestra   =  $codigo;
                $sampleStudy->parametro    =  $request->get('nom_muestra')[$s+1];
                $sampleStudy->save();

            }

            return redirect()->route('manageTest');     
            
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }

        return view();
    }
    
    //--- FIN SECCION CREATE SAMPLE ---//
    
    //Ver recurso
    public function show(Test $test)
    {
        return view();
    }

    //Formulario de recurso
    public function edit($test)
    {
        $listSample = Sample::where('id_muestra', $test)->first();

        return view('Tests.edit',compact('listSample'));
    }

    //Actualizar recurso
    public function update(Request $request, $test)
    {
        
         try {
            $sample = Sample::where('id_muestra', $test)->first();

            $sample->nro_parametros_estudio        =  $request->get('study_parameter');
            $sample->nro_modelos_ortogonales       =  $request->get('number_of_models');
            $sample->nro_repeticiones              =  $request->get('number_of_repeats');
            $sample->save();

            return redirect()->route('Tests.index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
        
    }

    public function destroy($id)
    {
        try {
            $sample = Sample::find($id);
            $sample->delete();
            return redirect()->route('Tests.index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
    
    
    function randomString() {
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
            $codigo =$rand."".$numeroAleatorio ;
        return $codigo;
    }
}
