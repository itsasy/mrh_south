<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ConsumerProfileResults extends Model
{
    protected $table        = 'resultados_perfil_consumidores';
	public $timestamps      = false;
	protected $primaryKey   = 'id_resultados_perfil_consumidores';

    public function Evaluation(){
        return $this->hasOne(Evaluation::class,'id_evaluacion','id_evaluacion');
    }

}
