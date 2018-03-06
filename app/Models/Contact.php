<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes ;
    public $table = 'contacts';
    protected $fillable = ['name','email','mobile','details'];
}
