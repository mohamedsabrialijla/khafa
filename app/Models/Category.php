<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes, Translatable;

    public $table = 'categories';
	public $translationModel = 'App\Models\CategoryTranslations';

    public $translatedAttributes = ['name'];
    protected $hidden = ['created_at','updated_at','deleted_at'];

    public function subcategory(){
        return $this->hasMany(Subcategory::class,'cat_id');
    }
   
}
