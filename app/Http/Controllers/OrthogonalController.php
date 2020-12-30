<?php

namespace App\Http\Controllers;

use App\Models\Taster;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Excel\ExcelOrthogonalExport;
use App\Http\Controllers\Excel\ExcelDuoTrioExport;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\DataOrthogonal;
use App\Models\Sample;
use App\Models\SampleStudyParameters;
use App\Models\DetailAttributes;
use App\Models\ChoiceTestSample;
use App\Models\AnswerQda;
use App\Models\DuoTrioResult;
use MathPHP\Probability\Distribution\Table\ChiSquared;
use App\Models\Evaluation;
use App\Models\ConsumerProfileResults;
use Carbon\Carbon;
use PDF;

class OrthogonalController extends Controller
{
    public function index()
    {


       /* DUO TRIO - PDF PRUEBA
       $numero_acertadas = 0;
       foreach($evaluation as $index => $evaluations){
            $duoTrioResult = DuoTrioResult::where('id_evaluacion', $evaluations->id_evaluacion)->get(); 
            $numero_acertadas = collect($duoTrioResult)->sum('nro_aciertos') + $numero_acertadas;
       }

        $p = sprintf('%1.3f', $choiceTest->nivel_significacion);
        //1 == Grados de libertad  $p = corregir puede que ese no sea el valor
        $x_tabular = ChiSquared::CHI_SQUARED_SCORES[1][$p];
       
        $nombrepdf = "Prueba_Resultado_Duo-Trio_" .$choiceTest->id_muestra."_". date("Y") . date("m") . date("d") . '_' . (date('H')) . date('i') . date('s'). '.pdf';
        PDF::loadView('PDF.resultado_duo_trio', compact('choiceTest','numero_acertadas','x_tabular'))->save(public_path() . '/pdf/' . $nombrepdf );
        */
       // QDA - PDF PRUEBA
     /*   $data_general = array();
        $data_general_inicial = array();

        $choiceTest       = ChoiceTestSample::find(130);
        $detailAttributes = DetailAttributes::where('id_eleccion_prueba_muestra', 130)->get(); 
        $evaluation       = Evaluation::select('id_catador')->where('id_eleccion_prueba_muestra', 130)->get(); 

        
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

              $nombrepdf = "Prueba_" . date("Y") . date("m") . date("d") . '_' . (date('H')) . date('i') . date('s'). '.pdf';
                  //  PDF::loadView('PDF.resultado_qda',compact('choiceTest','detailAttributes','resultadosQda','evaluation','sumatoria','desviacion_estandar','data_general','data_general_inicial'))->save(public_path() . '/pdf/' . $nombrepdf );
                        //  return view('PDF.resultado_qda', compact('choiceTest','detailAttributes','resultadosQda','evaluation','sumatoria','desviacion_estandar','data_general','data_general_inicial'));
            
             $nombrepdf = "PRUBEBA_Resultado_QDA_" .$choiceTest->id_muestra."_". date("Y") . date("m") . date("d") . '_' . (date('H')) . date('i') . date('s'). '.pdf';
            PDF::loadView('PDF.resultado_qda', compact('choiceTest','detailAttributes','resultadosQda','evaluation','sumatoria','desviacion_estandar','data_general','data_general_inicial'))->save(public_path() . '/pdf/' . $nombrepdf );
   
                
        */
        


    }
   
    //Vista de la tabla ortogonal
    public function show($idMuestra)
    {
        $sample = Sample::where('id_muestra', $idMuestra)->first();
        $sampleStudyParameters = SampleStudyParameters::where('id_muestra', $idMuestra)->get();

        if($sample->aleatorio_ortogonal != 1){
            $sample->nro_repeticiones = 0;
        }
        
        return view('Preparation.Orthogonal.create', compact('sample', 'sampleStudyParameters'));
    }

    //Registro de la tabla ortogonal

    public function store(Request $request){
         
         try {
             
            $sampleStudyParameters = SampleStudyParameters::where('id_muestra',$request->get('idMuestra'))->get();

            for ($r = 0; $r < $sampleStudyParameters[0]->Sample->nro_repeticiones + 1; $r++){
                for ($o = 0; $o < $sampleStudyParameters[0]->Sample->nro_modelos_ortogonales; $o++){
                    foreach($sampleStudyParameters as $p => $ssp){
                        
                        $text  = 'valor_'.$r.'_'.$o.'_'.$ssp->id_muestra_parametros_estudio;
                        
                        $dataOrthogonal = new DataOrthogonal();
                        $dataOrthogonal->id_muestra_parametros_estudio = $ssp->id_muestra_parametros_estudio;
                        $dataOrthogonal->bloque                        = $r + 1;
                        $dataOrthogonal->item                          = $o + 1;
                        
                        if($request->get($text) != null){
                            $dataOrthogonal->respuesta            = $request->get($text);
                            $dataOrthogonalExcel[$r][$o][$ssp->id_muestra_parametros_estudio]  = $request->get($text);
                        }else{
                            $dataOrthogonal->respuesta            = 0;
                            $dataOrthogonalExcel[$r][$o][$ssp->id_muestra_parametros_estudio]  = 0;

                        }
                        
                            $dataOrthogonal->save();           
                    }
                }
            }
            
            $fecha    = Carbon::now()->format("Ymd_His");
            $filename = 'Excel_'.$request->get('idMuestra').'_' . $fecha . '.xlsx';
            $exc      = Excel::store(new ExcelOrthogonalExport($dataOrthogonalExcel,$sampleStudyParameters), $filename, 'excel');
            
            $sample = Sample::find($request->get('idMuestra'));
            $sample->estado_modelos       = 2;
            $sample->codificacion_muestra = $filename;
            $sample->save();
            
            return $this->success_message('preparation.index', 'creó');
        } catch (\Exception $e) {
            return $this->error_message();
        }
    }

    public function downloadExcelOrthogonal($filename){
            $file = public_path()."/excel/".$filename;
            return response()->download($file);
     
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