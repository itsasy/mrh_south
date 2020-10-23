<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TastersController extends Controller
{
    public function manage()
    {
        return view('Tasters.manage')->with([]);
    }

    public function index()
    {
        $user_list = User::paginate(10);
        return view('Tasters.index', compact('user_list'));
    }

    public function create()
    {
        return view('Tasters.create');
    }

    public function store(Request $request)
    {
        try {
            //
            return $this->success_message('taster.index', 'creó');
        } catch (\Exception $e) {
            return $this->error_message();
        }
    }

    public function edit(User $taster)
    {
        return view('Tasters.edit', compact('taster'));
    }

    public function update(Request $request, User $taster)
    {
        try {
            //method update

            //$taster->atributo = $request->campo;

            //$taster->save();
            return $this->success_message('taster.index', 'actualizó');
        } catch (\Exception $e) {
            return $this->error_message();
        }
    }

    public function destroy(User $taster)
    {
        try {
            $taster->delete();
            return $this->success_message('taster.index', 'eliminó');
        } catch (\Exception $e) {
            return $this->error_message();
        }
    }

    public function success_message($route, $type)
    {
        return redirect()->route($route)->withSuccess("Se {$type} correctamente");
    }

    public function error_message()
    {
        return redirect()->back()->withError('Ocurrió un error inesperado.');
    }
}
