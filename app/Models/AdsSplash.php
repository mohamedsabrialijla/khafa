<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class AdsSplash extends Model
{
    use SoftDeletes;
    public $table = 'ads_splashes';
    protected $fillable = ['image','type'];

    protected $hidden = ['created_at','updated_at','deleted_at','locale'];

    public function getImageAttribute($image)
    {
        return url($image);
    }
}
