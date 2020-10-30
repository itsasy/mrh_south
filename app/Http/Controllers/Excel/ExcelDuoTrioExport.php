<?php

namespace App\Http\Controllers\Excel;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;


class ExcelDuoTrioExport implements FromView 
{
    
    use Exportable;
    
    public function __construct()
    {
      
    }

    public function view():View 
    {
       

        $exc = view('Excel.excel_duo_trio_administrador');
        return $exc;
        
    }
    
}