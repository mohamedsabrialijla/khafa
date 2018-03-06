<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryTranslations extends Model
{
    use SoftDeletes;
    protected $fillable = ['locale', 'category_id', 'name'];
}
