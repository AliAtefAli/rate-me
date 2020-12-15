<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Addition extends Model
{
    use Translatable, SoftDeletes;
    public $translatedAttributes = ['name', 'description'];
    protected $fillable = ['price', 'quantity', 'product_id', 'image'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
