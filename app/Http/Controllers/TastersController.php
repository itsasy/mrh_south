<?php

namespace App\Http\Controllers;

use App\Models\Taster;
use Illuminate\Http\Request;

class TastersController extends Controller
{
    public function manage()
    {
        return view('Tasters.manage')->with([]);
    }

    public function index()
    {
        return view('Tasters.index')->with([]);
    }

    public function create()
    {
        return view('Tasters.create')->with([]);
    }

    public function store(Request $request)
    {
    }

    public function edit(Taster $taster)
    {
        return view('Tasters.edit')->with([]);
    }

    public function update(Request $request, Taster $taster)
    {
        return view('')->with([]);
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
