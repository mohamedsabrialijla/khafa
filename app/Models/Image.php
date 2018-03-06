<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Image extends Model
{
    use SoftDeletes;

	public $table = 'images';
	protected $fillable = ['image','product_id'];
	protected $hidden = ['created_at','updated_at','deleted_at'];
	
	
	public function getImageAttribute($image)
		{
			if (!is_null($image)) {
		            return url($image);
		        }
		        return "";
		}	

}
