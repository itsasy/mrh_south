<?php

namespace App\Http\Controllers\Excel;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;


class ExcelOrthogonalExport implements FromView 
{
    
    use Exportable;
    
    public function __construct($dataOrthogonalExcel,$sampleStudyParameters)
    {
        $this->dataOrthogonalExcel       = $dataOrthogonalExcel;
        $this->sampleStudyParameters     = $sampleStudyParameters;

    }

    public function view():View 
    {
        $dataOrthogonalExcel     = $this->dataOrthogonalExcel;      
        $sampleStudyParameters   = $this->sampleStudyParameters;      

        $exc = view('Excel.excel_table_orthogonal', ['dataOrthogonalExcel' => $dataOrthogonalExcel,'sampleStudyParameters' => $sampleStudyParameters]);
        return $exc;
        
    }
    
}