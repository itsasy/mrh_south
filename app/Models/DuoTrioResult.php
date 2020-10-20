<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class DuoTrioResult extends Model
{
    protected $table        = 'resultados_duo_trio';
	public $timestamps      = false;
	protected $primaryKey   = 'id_resultados_duo_trio';

    public function Evaluation(){
        return $this->hasOne(Evaluation::class,'id_evaluacion','id_evaluacion');
    }

}
