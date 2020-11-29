<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Addition extends Model
{
    use Translatable, SoftDeletes;
    public $translatedAttributes = ['name', 'description'];
    protected $fillable = ['price', 'quantity', 'menu_id'];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
