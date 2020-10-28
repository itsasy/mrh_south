<?php

namespace App\Http\Controllers;

use App\Models\Taster;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Excel\ExcelOrthogonalExport;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\DataOrthogonal;
use App\Models\Sample;
use App\Models\SampleStudyParameters;
use Carbon\Carbon;

class OrthogonalController extends Controller
{
    public function index()
    {
        $fecha = Carbon::now()->format("Ymd_His");
        $filename = 'Excel_45' . $fecha . '.xlsx';
        $exc = Excel::store(new ExcelOrthogonalExport(), $filename, 'excel');
    }

    //Vista de la tabla ortogonal
    public function show($idMuestra)
    {
        $sample = Sample::where('id_muestra', $idMuestra)->first();
        $sampleStudyParameters = SampleStudyParameters::where('id_muestra', $idMuestra)->get();

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

    
    public function success_message($route, $type)
    {
        return redirect()->route($route)->withSuccess("Se {$type} correctamente");
    }

    public function error_message()
    {
        return redirect()->back()->withError('Ocurrió un error inesperado.');
    }


}
