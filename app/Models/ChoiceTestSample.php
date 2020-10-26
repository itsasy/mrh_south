<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ChoiceTestSample extends Model
{
    protected $table        = 'eleccion_prueba_muestra';
	public $timestamps      = false;
	protected $primaryKey   = 'id_eleccion_prueba_muestra';

    public function Sample(){
        return $this->hasOne(Sample::class,'id_muestra','id_muestra');
    }
    
    public function TestType(){
        return $this->hasOne(TestType::class,'id_tipo_prueba','id_tipo_prueba');
    }
    
}
