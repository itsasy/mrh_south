<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChoiceTestSample;
use App\Models\Evaluation;

class ResultsController extends Controller
{
    public function index()
    {
        $choiceTestSample = ChoiceTestSample::where('estado', 'EJECUTADA')->with('Sample')->get();

        return view('Results.index', compact('choiceTestSample'));
    }

    public function show($id)
    {
        $choiceTestSample = Evaluation::with('ChoiceTestSample')->where(['id_catador' => $id, 'estado' => 'EJECUTADA'])->get();

        return view('Results.index', compact('choiceTestSample'));
    }
}
