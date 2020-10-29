<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use App\Models\User;
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
        $type = $this->types_permited($request->type);

        $samples = $this->samples($request->preparation);

        $tasters = $this->tasters();

        return view('Preparation.create', compact('tasters'))
            ->with([
                'type' => $type,
                'number_of_attributes' => $samples->nro_parametros_estudio,
                'number_of_repeats' => $samples->nro_repeticiones
            ]);
    }

    public function store(Request $request)
    {
    }

    public function types_permited($type)
    {
        $types = ['QDA', 'Aceptabilidad', 'Duo-Trio'];

        return in_array($type, $types) ? $type : abort(404);
    }

    public function tasters()
    {
        return User::where('id_roles', 2)->Orderby('id_usuario', 'asc')->get(['id_usuario', 'nombres', 'apellidos']);
    }

    public function samples($id)
    {
        return Sample::findOrFail($id);
    }
}
