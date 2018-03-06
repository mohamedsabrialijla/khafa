<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Rate extends Model
{
    use SoftDeletes;
	 public $table = 'rates';
	protected $fillable = ['rest_id','user_id','rate'];
	protected $hidden = ['created_at','updated_at','deleted_at'];
}
