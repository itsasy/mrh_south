<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestsController extends Controller
{
    public function manage()
    {
        return view('Tests.manage')->with([]);
    }

    public function index()
    {
        return view('Tests.index')->with([]);
    }

    //formulario
    public function create()
    {
        return view('Tests.create')->with([]);
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
        return view('Test.edit')->with([]);
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
