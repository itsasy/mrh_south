<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class AnswerQda extends Model
{
  
    protected $table        = 'respuesta_qda';
	public $timestamps      = false;
	protected $primaryKey   = 'id_respuestas_qda';

    public function DetailQda(){
        return $this->hasOne(DetailQda::class,'id_detalle_qda','id_detalle_qda');
    }
    public function Evaluation(){
        return $this->hasOne(Evaluation::class,'id_evaluacion','id_evaluacion');
    }
}
