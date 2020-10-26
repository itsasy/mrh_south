<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Request;
class ModuleController extends Controller
{
    public function index()
    {
        $type_user = Request::path();

        if ($type_user == 'admin') {
            return view('modules.admi');
        }

        return view('modules.taster');
    }
}
