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

class OrthogonalController extends Controller {
   
    public function index()
    {
        
       date_default_timezone_set('America/Lima');
       $fecha = date("Y").date("m").date("d").'_'.(date('H')).date('i').date('s');

       $filename = 'Excel_45'.$fecha.'.xlsx';
       $exc = Excel::store(new ExcelOrthogonalExport(),$filename,'excel');

       // return view('Tasters.index')->with([]);
    }

    
}
