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


class OrthogonalController extends Controller {
   
    public function index()
    {
       date_default_timezone_set('America/Lima');
       $fecha = date("Y").date("m").date("d").'_'.(date('H')).date('i').date('s');

       $filename = 'Excel_45'.$fecha.'.xlsx';
       $exc = Excel::store(new ExcelOrthogonalExport(),$filename,'excel');

       // return view('Tasters.index')->with([]);
    }
    
    //Vista de la tabla ortogonal
    public function show($idMuestra)
    {
        $sample = Sample::where('id_muestra',$idMuestra)->first();
        $sampleStudyParameters = SampleStudyParameters::where('id_muestra',$idMuestra)->get();
        
        return view('Preparation.Orthogonal.create',compact('sample','sampleStudyParameters'));
    }
    
    //Registro de la tabla ortogonal
    public function store(Request $request){
         
         try {
     
            $dataOrthogonal = new DataOrthogonal();
            
            $dataOrthogonal->id_muestra_parametros_estudio = $request->get('id_muestra_parametros_estudio');
            $dataOrthogonal->bloque                        = $request->get('bloque');
            $dataOrthogonal->item                          = $request->get('item');
            $dataOrthogonal->respuesta                     = $request->get('respuesta');
            $dataOrthogonal->save();
            
            
           date_default_timezone_set('America/Lima');
           $fecha = date("Y").date("m").date("d").'_'.(date('H')).date('i').date('s');
    
           $filename = 'Excel_45'.$fecha.'.xlsx';
           $exc = Excel::store(new ExcelOrthogonalExport(),$filename,'excel');
            
            return redirect()->route('manageTest');     
            
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
        
        

       // return view('Tasters.index')->with([]);
    }

}
