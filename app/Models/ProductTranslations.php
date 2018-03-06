<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductTranslations extends Model
{
    use SoftDeletes;
	
    protected $fillable = ['locale','product_id', 'name','description'];
}
