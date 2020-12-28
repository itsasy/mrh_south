<?php

namespace App\Http\Controllers\Excel;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;


class ExcelDuoTrioExport implements FromView 
{
    
    use Exportable;
    
    public function __construct($muestra1_valores,$muestra2_valores,$igual_p,$choiceTestSample)
    {
              $this->muestra1_valores       = $muestra1_valores;
              $this->muestra2_valores       = $muestra2_valores;
              $this->igual_p                = $igual_p;
              $this->choiceTestSample                = $choiceTestSample;

    }

    public function view():View 
    {
       
        $muestra1_valores     = $this->muestra1_valores;      
        $muestra2_valores     = $this->muestra2_valores;      
        $igual_p     = $this->igual_p;      
        $choiceTestSample     = $this->choiceTestSample;      

        $exc = view('Excel.excel_duo_trio_administrador',['choiceTestSample'=>$choiceTestSample, 'igual_p' => $igual_p,'muestra1_valores' => $muestra1_valores,'muestra2_valores' => $muestra2_valores]);
        return $exc;
        
    }
    
}