<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Catsize extends Model
{
    use SoftDeletes;

	public $table = 'catsizes';
	protected $fillable = ['name'];
	protected $hidden = ['created_at','updated_at','deleted_at'];
}
