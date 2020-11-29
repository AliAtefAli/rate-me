<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use Translatable, SoftDeletes;
    protected $fillable = ['store_id', 'url'];
    public $translatedAttributes = ['name', 'description'];

    public function store()
    {
        return $this->belongsToMany(Store::class);
    }
}
