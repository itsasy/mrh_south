<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table        = 'usuario';
	public $timestamps      = false;
	protected $primaryKey   = 'id_usuario';
	protected $hidden = ['password'];
    public $incrementing = false;

    public function Roles(){
        return $this->hasOne(Roles::class,'id_roles','id_roles');
    }

    public function authorizeRoles($roles)
    {
      if ($this->hasAnyRole($roles)) {
        return true;
      }
      abort(401, 'No tiene acceso.');
    }

    public function hasAnyRole($roles)
    {
      if (is_array($roles)) {
        foreach ($roles as $role) {
          if ($this->hasRole($role)) {
            return true;
          }
        }
      } else {
        if ($this->hasRole($roles)) {
          return true;
        }
      }
      return false;
    }

    public function hasRole($role)
    {
      if ($this->roles()->where('nombre', $role)->first()) {
        return true;
      }
      return false;
    }
}
