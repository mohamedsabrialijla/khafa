<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Subcategory extends Model
{
    use SoftDeletes, Translatable;

    public $table = 'subcategories';
	public $translationModel = 'App\Models\SubcategoryTranslations';

    public $translatedAttributes = ['name'];
    protected $fillable = ['cat_id'];
    protected $hidden = ['created_at','updated_at','deleted_at'];


    public function category(){
    	return $this->belongsTo(Category::class ,'cat_id');
    }

    public function products(){
    	return $this->hasMany(Product::class ,'subcat_id');
    }

}
