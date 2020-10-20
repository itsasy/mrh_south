<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table        = 'usuario';
	public $timestamps      = false;
	protected $primaryKey   = 'id_usuario';
	protected $hidden = ['password'];

    public function Roles(){
        return $this->hasOne(Roles::class,'id_roles','id_roles');
    }
}
