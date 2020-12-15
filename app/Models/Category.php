<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use Translatable, SoftDeletes;
    public $translatedAttributes = ['name', 'description'];
    protected $fillable = ['image'];

    public function stores()
    {
        return $this->hasMany(Store::class);
    }
}
