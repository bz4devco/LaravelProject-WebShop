<?php

namespace App\Traits\Permissions;

trait HasPermissionsTrait
{

    public function roles()
    {
        return $this->belongsToMany('App\Models\User\Role');
    }


    public function permissions()
    {
        return $this->belongsToMany('App\Models\User\Permission');
    }


    public function hasPermission($permission)
    {
        return (bool) $this->permissions()->where('name', $permission->name)->count();
    }

    public function hasPermissionTo($permission)
    {
        return $this->hasPermission($permission) || $this->hasPermissionThroughRole($permission);
    }

    public function hasPermissionThroughRole($permission)
    {
        foreach ($permission->roles as $role)
        {
            if($this->roles->contains($role)){
                return true;
            }
        }
        return false;
    }


    public function hasRoles(...$roles)
    {
        foreach ($roles as $role) {
            if ($this->roles->contains('name', $role)) {
                return true;
            } else {
                return false;
            }
            return false;
        }
    }
}
