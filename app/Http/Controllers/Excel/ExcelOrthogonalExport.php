<?php

namespace App\Http\Controllers\Excel;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;


class ExcelOrthogonalExport implements FromView 
{
    
    use Exportable;
    
    public function __construct()
    {

    }

    public function view():View 
    {
        $exc = view('Excel.excel_table_orthogonal');
        return $exc;
        
    }
    
}