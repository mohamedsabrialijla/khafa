<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubcategoryTranslations extends Model
{
     use SoftDeletes;
	
    protected $fillable = ['locale','subcategory_id', 'name'];
}
