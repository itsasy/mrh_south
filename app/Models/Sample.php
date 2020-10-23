<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    protected $table        = 'muestra';
	public $timestamps      = false;
	protected $primaryKey   = 'id_muestra';
    public $incrementing = false;
    
    public function User(){
        return $this->hasOne(User::class,'id_usuario','id_usuario');
    }
    
 
}
