<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TestType extends Model{
  
    protected $table        = 'tipo_prueba';
	public $timestamps      = false;
	protected $primaryKey   = 'id_tipo_prueba';

  
}
