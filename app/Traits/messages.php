<?php

namespace App\Traits;

trait messages
{
    public function success_message($route, $type)
    {
        return redirect()->route($route)->withSuccess("Se {$type} correctamente");
    }

    public function error_message()
    {
        return redirect()->back()->withError('Ocurrió un error inesperado.');
    }
}
