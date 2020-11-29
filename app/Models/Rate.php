<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use Translatable;
    protected $fillable = ['location', 'cleanliness', 'price', 'quality', 'store_id'];
    public $translatedAttributes = ['description'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
