<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use Translatable, SoftDeletes;
    protected $fillable = ['menu_id', 'price', 'quantity'];
    public $translatedAttributes = ['name', 'description'];

    public function additions()
    {
        return $this->hasMany(Addition::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
