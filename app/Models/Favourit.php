<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favourit extends Model
{
   use SoftDeletes;

	public $table = 'favourits';
	protected $fillable = ['product_id','user_id','status'];
	protected $hidden = ['created_at','updated_at','deleted_at'];


	// public function product(){
 //    	return $this->belongsTo(Products::class,'product_id');
 //    }	
}
