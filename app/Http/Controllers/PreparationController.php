<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use Illuminate\Http\Request;

class PreparationController extends Controller
{
    public function index()
    {
        $samples = Sample::OrderBy('fecha_registro', 'asc')->paginate(10);

        return view('Preparation.index', compact('samples'));
    }

    public function create(Request $request)
    {
        $type = $request->type;
        return view('Preparation.create', compact('type'));
    }

    public function store(Request $request)
    {
    }
}
