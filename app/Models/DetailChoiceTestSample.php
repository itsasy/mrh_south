<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class DetailChoiceTestSample extends Model
{
    protected $table        = 'detalle_eleccion_prueba_muestra';
	public $timestamps      = false;
	protected $primaryKey   = 'id_detalle_eleccion_prueba_muestra';

    public function ChoiceTestSample(){
        return $this->hasOne(ChoiceTestSample::class,'id_eleccion_prueba_muestra','id_eleccion_prueba_muestra');
    }
}
