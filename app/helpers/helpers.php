<?php

if (! function_exists('hasPermission')) {
    function hasPermission($permissionName) {
        if (auth()->user()) {
            if (auth()->user()->role){
                $permissions = \App\Models\Permission::permissionNamesToArray(auth()->user()->role);
                if (in_array($permissionName, $permissions)) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
}
