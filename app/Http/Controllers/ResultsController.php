<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChoiceTestSample;
use App\Models\Evaluation;

class ResultsController extends Controller
{
    public function index()
    {
        $choiceTestSample = ChoiceTestSample::where('estado', 'EJECUTADA')
            ->with('Sample')
            ->get();

        return view('Results.index', compact('choiceTestSample'));
    }

    public function show()
    {
        $choiceTestSample = Evaluation::with('ChoiceTestSample')
            ->where([
                'id_catador' => auth()->user()->id_usuario,
                'estado' => 'EJECUTADA'
            ])->get();

        return view('Results.index', compact('choiceTestSample'));
    }
}
