<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class DetailResultsDuoTrio extends Model
{
  protected $table          = 'detalle_resultados_duo_trio';
	public $timestamps      = false;
	protected $primaryKey   = 'id_detalle_resultados_duo_trio';

    public function AnswerDuoTrio(){
        return $this->hasOne(AnswerDuoTrio::class,'id_resultados_duo_trio','id_resultados_duo_trio');
    }
}
