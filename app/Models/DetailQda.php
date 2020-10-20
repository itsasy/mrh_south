<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class DetailQda extends Model
{
    protected $table        = 'detalle_qda';
	public $timestamps      = false;
	protected $primaryKey   = 'id_detalle_qda';

    public function ChoiceTestSample(){
        return $this->hasOne(ChoiceTestSample::class,'id_eleccion_prueba_muestra','id_eleccion_prueba_muestra');
    }
}
