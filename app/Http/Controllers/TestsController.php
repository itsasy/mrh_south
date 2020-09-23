<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestsController extends Controller
{
    public function index()
    {
        return view('Test.base')->with([
            'title' => 'Preparación de Pruebas',
            'view' => 'list.tests'
        ]);
    }

    //formulario
    public function create()
    {
        return view('Test.base')->with([
            'title' => 'Creación de Pruebas',
            'view' => 'forms.form'
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
            'title' => 'Edición de Pruebas'
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
