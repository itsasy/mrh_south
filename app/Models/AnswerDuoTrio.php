<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class AnswerDuoTrio extends Model
{
    
    protected $table = 'respuesta_duo_trio';
	public $timestamps = false;
	protected $primaryKey = 'id_respuestas_duo_trio';

    public function ChoiceTestSample(){
        return $this->hasOne(ChoiceTestSample::class,'id_eleccion_prueba_muestra','id_eleccion_prueba_muestra');
    }

}
