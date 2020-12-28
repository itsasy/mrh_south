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
        $choiceTestSample_old = Evaluation::with('ChoiceTestSample')
            ->where([
                'id_catador' => auth()->user()->id_usuario,
                'estado' => 2
            ])->get();
            
        $choiceTestSample = [];
        
        foreach($choiceTestSample_old as $cs){
            array_push($choiceTestSample, $cs->ChoiceTestSample);
        }
        //dd($choiceTestSample);

        return view('Results.index_taster', compact('choiceTestSample'));
    }
}
