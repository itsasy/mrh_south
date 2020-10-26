<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class DetailAttributes extends Model
{
    protected $table        = 'detalle_atributos';
	public $timestamps      = false;
	protected $primaryKey   = 'id_detalle_atributos';

    public function ChoiceTestSample(){
        return $this->hasOne(ChoiceTestSample::class,'id_eleccion_prueba_muestra','id_eleccion_prueba_muestra');
    }
}
