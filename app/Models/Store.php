<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use Translatable, SoftDeletes;
    protected $fillable = ['phone', 'delivery_type', 'password', 'user_id', 'category_id'];
    public $translatedAttributes = ['name', 'description'];

    public function menu()
    {
        return $this->hasOne(Menu::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
