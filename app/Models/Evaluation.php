<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $table        = 'evaluacion';
	public $timestamps      = false;
	protected $primaryKey   = 'id_evaluacion';

    public function Taster(){
        return $this->hasOne(User::class,'id_catador','id_catador');
    }
    
    public function ChoiceTestSample(){
        return $this->hasOne(ChoiceTestSample::class,'id_eleccion_prueba_muestra','id_eleccion_prueba_muestra');
    }
}
