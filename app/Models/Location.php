<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use Translatable;
    public $translatedAttributes = ['store_id'];
    protected $fillable = ['latitude', 'longitude'];

    public function stores()
    {
        return $this->hasMany(Store::class);
    }
}
