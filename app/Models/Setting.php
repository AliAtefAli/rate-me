<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use Translatable;
    protected $fillable = ['site_link', 'android_link', 'ios_link', 'default_language'];
    public $translatedAttributes = ['name','policies' , 'description', 'about'];

}
