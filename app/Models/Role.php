<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'display_name', 'description'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    protected static function attachPermissions($role, $permissionRequests, $rolePermissionsNames)
    {
        foreach ($permissionRequests as $permission) {
            if (!in_array($permission, $rolePermissionsNames)) {
                $permission = Permission::where('name', $permission)->get();
                $role->permissions()->attach($permission);
            }
        }
    }

    protected static function detachPermissions($role, $permissionRequests, $rolePermissionsNames)
    {
        foreach ($rolePermissionsNames as $permission) {
            if (!in_array($permission, $permissionRequests)) {
                $permission = Permission::where('name', $permission)->get();
                $role->permissions()->detach($permission);
            }
        }
    }


    protected static function roleNamesToArray() {
        $roles = json_decode(json_encode(Role::all()), true);
        $rolesNames = [];
        foreach ($roles as $role) {
            array_push($rolesNames, $role['name']);
        }

        return $rolesNames;
    }
}
