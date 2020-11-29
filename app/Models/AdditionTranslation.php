<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdditionTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'description'];
}
