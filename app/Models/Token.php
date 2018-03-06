<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Token extends Model
{
     use SoftDeletes;
	 public $table = 'tokens'; 

	  protected $fillable = ['user_id','token','type'];
	  protected $hidden = ['updated_at','deleted_at'];

}
