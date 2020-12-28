<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;

class ModuleController extends Controller
{
    public function index_admi()
    {
        return view('modules.admi');
    }
    
    public function index_taster(){
        return view('modules.taster');
    }
}
