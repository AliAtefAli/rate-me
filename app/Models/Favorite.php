<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = ['user_id', 'store_id'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
