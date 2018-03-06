<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Order extends Model
{
    use SoftDeletes;
	 public $table = 'orders'; 

	  protected $fillable = ['user_id','price','type','location','latitude','longitude','status','response'];
	  protected $hidden = ['updated_at','deleted_at'];


    public function username(){
    	return $this->belongsTo(User::class,'user_id');
    }	
    
    public function products(){
	  	return $this->hasMany(ProductOrder::class);
	  	//return $this->belongsToMany(Product::class,'product_orders');
	  }
	  
	  
	  
	  
	
	  
	  
	
    
   	  
	  
    
   

}
