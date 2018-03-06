<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dimsav\Translatable\Translatable;

class Help extends Model
{
    use SoftDeletes, Translatable;
	 public $table = 'helps';
	 public $translationModel = 'App\Models\HelpTranslation';

	 protected $fillable = ['status'];
	 public $translatedAttributes =['locale','question','answer'];
}
