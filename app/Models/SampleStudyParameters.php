<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SampleStudyParameters extends Model
{
    protected $table        = 'muestra_parametros_estudio';
	public $timestamps      = false;
	protected $primaryKey   = 'id_muestra_parametros_estudio';

    public function Sample(){
        return $this->hasOne(Sample::class,'id_muestra','id_muestra');
    }
    
 
}
