<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function index()
    {
        return view('Test.base')->with(
            ['type' => 'Preparación',
            'view' => 'preparingTest.table']
        );
    }

    //formulario
    public function create()
    {
        return view('Test.base')->with([
            'type' => 'Creación',
            'view' => 'formTest.form'
        ]);
    }

    public function store(Request $request)
    {
        return view();
    }

    //Ver recurso
    public function show(Test $test)
    {
        return view();
    }

    //Formulario de recurso
    public function edit(Test $test)
    {
        return view('Test.FormTest')->with([
            'type' => 'Edición'
        ]);
    }

    //Actualizar recurso
    public function update(Request $request, Test $test)
    {
    }

    public function destroy(Test $test)
    {
        //
    }
}
