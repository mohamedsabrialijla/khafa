<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Craftname extends Model
{
    use SoftDeletes, Translatable;

    public $table = 'craftnames';
	public $translationModel = 'App\Models\CraftnameTranslations';

    public $translatedAttributes = ['name'];
    protected $hidden = ['created_at','updated_at','deleted_at'];
}
