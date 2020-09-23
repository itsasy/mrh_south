<?php

namespace App\Http\Controllers;

use App\Models\Taster;
use Illuminate\Http\Request;

class tasterController extends Controller
{
    public function index()
    {
        return view('Tasters.base')->with([
            'title' => 'Lista de jurados',
            'view' => 'list.tasters',
        ]);
    }

    public function create()
    {
        return view('Tasters.base')->with([
            'title' => 'Nuevo jurado',
            'view' => 'forms.form',
            'action' => 'taster.store'
        ]);
    }

    public function store(Request $request)
    {
       
    }

    public function edit(Taster $taster)
    {
        return view('Tasters.base')->with([
            'title' => 'Editar jurado',
            'view' => 'forms.form',
            'taster' => $taster
        ]);
    }

    public function update(Request $request, Taster $taster)
    {
        return view('')->with([
            ''
        ]);
    }

    public function destroy(Taster $taster)
    {
        try {
            $taster->delete();
            
            return back();
        } catch (\Throwable $th) {
            return back()->with([]);
        }
    }
}
