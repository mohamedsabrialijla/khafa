<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Features extends Model
{
    use SoftDeletes;

	public $table = 'features';
	protected $fillable = ['product_id','color','size_id','dimensions','quentity','price','day_deliverd','status'];
	protected $hidden = ['created_at','updated_at','deleted_at'];
	protected $appends = ['size'];

	public function getSizeAttribute(){
		if($this->attributes["size_id"]){
		return Catsize::find($this->attributes["size_id"])->name; }else{
			return "";
		}
	}


	 public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
