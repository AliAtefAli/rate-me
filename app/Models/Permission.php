<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Ui\UiServiceProvider;

class Permission extends Model
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
