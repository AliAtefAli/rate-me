<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use Translatable, SoftDeletes;
    public $translatedAttributes = ['name', 'description'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
