<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Ui\UiServiceProvider;

class Permission extends Model
{
    protected $fillable = ['name', 'display_name', 'description'];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    protected static function permissionNamesToArray($role) {
        $rolePermissions = json_decode(json_encode($role->permissions), true);
        $rolePermissionsNames = [];
        foreach ($rolePermissions as $permission) {
            array_push($rolePermissionsNames, $permission['name']);
        }

        return $rolePermissionsNames;
    }

    protected static function permissionIdsToArray($role) {
        $rolePermissions = json_decode(json_encode($role->permissions), true);
        $rolePermissionsIds = [];
        foreach ($rolePermissions as $permission) {
            array_push($rolePermissionsIds, $permission['id']);
        }

        return $rolePermissionsIds;
    }

}
