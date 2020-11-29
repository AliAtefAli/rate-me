<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use Translatable, SoftDeletes;
    protected $fillable = ['payment_method', 'start_date', 'end_date'];
    public $translatedAttributes = ['name', 'description'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
