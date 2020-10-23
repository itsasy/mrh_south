<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class DataOrthogonal extends Model
{
  
    protected $table        = 'datos_ortogonales';
	public $timestamps      = false;
	protected $primaryKey   = 'id_datos_ortogonales';

    public function SampleStudyParameters(){
        return $this->hasOne(SampleStudyParameters::class,'id_muestra_parametros_estudio','id_muestra_parametros_estudio');
    }
   
}



