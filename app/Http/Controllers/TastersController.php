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
        $user_list = User::where('id_roles', 2)->Orderby('id_usuario', 'asc')->paginate(10);
        return view('Tasters.index', compact('user_list'));
    }

    public function create()
    {
        return view('Tasters.create');
    }

    public function store(Request $request)
    {
        try {
            $taster = new User();
            $taster->nombres = $request->name;
            $taster->apellidos = $request->lastname;
            $taster->username = ''; //cambiar
            $taster->password = ''; //cambiar
            $taster->nro_documento = $request->dni;
            $taster->tipo_documento = 1;
            $taster->id_roles = 2;
            $taster->genero = $request->gender;
            $taster->grado = $request->grade;
            $taster->celular = $request->cellphone;
            $taster->correo = $request->email;

            $taster->save();
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
            $taster->nombres = $request->name;
            $taster->apellidos = $request->lastname;
            $taster->nro_documento = $request->dni;
            $taster->genero = $request->gender;
            $taster->grado = $request->grade;
            $taster->celular = $request->cellphone;

            $taster->save();
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
}
