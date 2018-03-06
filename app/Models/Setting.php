<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use Translatable; 
    public $translatedAttributes = ['title', 'description', 'address', 'key_words'];

    protected $hidden = ['created_at','updated_at','deleted_at'];

    public function getLogoAttribute($logo)
    {
        return url($logo);
    }
}
